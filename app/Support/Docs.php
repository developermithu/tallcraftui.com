<?php

namespace App\Support;

use Composer\InstalledVersions;
use Developermithu\Tallcraftui\Helpers\BorderRadiusHelper;
use Developermithu\Tallcraftui\TallCraftUiServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use Throwable;

/**
 * Reads the documentation registry in config/docs.php and derives the
 * navigation, search index, table of contents and API reference from it.
 */
class Docs
{
    private ?Collection $sections = null;

    private array $headings = [];

    /**
     * Sidebar sections, each with its pages.
     */
    public function sections(): Collection
    {
        return $this->sections ??= collect(config('docs.sections'))->map(function (array $section) {
            $section['slug'] = Str::slug($section['title']);
            $section['pages'] = collect($section['pages'])
                ->map(fn (array $page) => $this->hydrate($page, $section))
                ->all();

            return $section;
        });
    }

    /**
     * Sections that group component pages.
     */
    public function componentSections(): Collection
    {
        return $this->sections()->where('group', 'components')->values();
    }

    public function pages(): Collection
    {
        return $this->sections()->flatMap(fn (array $section) => $section['pages'])->values();
    }

    public function componentPages(): Collection
    {
        return $this->componentSections()->flatMap(fn (array $section) => $section['pages'])->values();
    }

    public function find(?string $route): ?array
    {
        return $route ? $this->pages()->firstWhere('route', $route) : null;
    }

    public function current(): ?array
    {
        return $this->find(Route::currentRouteName());
    }

    public function isActive(array $page): bool
    {
        return Route::currentRouteName() === $page['route'];
    }

    public function previous(array $page): ?array
    {
        $pages = $this->pages();
        $index = $pages->search(fn (array $item) => $item['route'] === $page['route']);

        return $index > 0 ? $pages[$index - 1] : null;
    }

    public function next(array $page): ?array
    {
        $pages = $this->pages();
        $index = $pages->search(fn (array $item) => $item['route'] === $page['route']);

        return $index !== false ? $pages->get($index + 1) : null;
    }

    public function related(array $page): Collection
    {
        return collect($page['related'] ?? [])->map(fn (string $route) => $this->find($route))->filter()->values();
    }

    public function popular(): Collection
    {
        return collect(config('docs.popular'))->map(fn (string $route) => $this->find($route))->filter()->values();
    }

    /**
     * Absolute URL on the canonical domain (tallcraftui.com) for a path or app URL.
     */
    public function canonicalUrl(?string $url = null): string
    {
        $path = parse_url($url ?? request()->url(), PHP_URL_PATH) ?: '/';

        return rtrim(config('docs.site_url'), '/').($path === '/' ? '/' : '/'.ltrim($path, '/'));
    }

    /**
     * Breadcrumb trail for a page, as [label => url|null].
     */
    public function breadcrumbs(array $page): array
    {
        $crumbs = ['Docs' => route('docs')];

        if ($page['route'] === 'docs') {
            return $crumbs;
        }

        if (($page['group'] ?? null) === 'components') {
            $crumbs['Components'] = route('docs').'#components';
        }

        $crumbs[$page['section']] = null;
        $crumbs[$page['title']] = null;

        return $crumbs;
    }

    /**
     * Headings (h2/h3) on a page, read from its Blade source in document order.
     *
     * Picks up `<x-code-block title="...">`, `<x-docs.section title="...">` and
     * plain `<h2 id="...">` elements. Headings rendered by the layout (API
     * reference, related components) are appended by the layout itself.
     */
    public function headings(array $page): array
    {
        if (isset($this->headings[$page['route']])) {
            return $this->headings[$page['route']];
        }

        $path = resource_path('views/'.($page['view'] ?? ''));

        if (! isset($page['view']) || ! is_file($path)) {
            return $this->headings[$page['route']] = [];
        }

        $source = file_get_contents($path);
        $found = [];

        preg_match_all('/<x-(?:code-block|docs\.section)\b([^>]*?)(?<![:\w-])title="([^"]+)"([^>]*)>/', $source, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);

        foreach ($matches as $match) {
            $attributes = $match[1][0].' '.$match[3][0];
            $level = preg_match('/\blevel="3"/', $attributes) ? 3 : 2;

            $found[$match[0][1]] = [
                'title' => $match[2][0],
                'id' => Str::slug($match[2][0]),
                'level' => $level,
                'new' => (bool) preg_match('/(?<![:\w-])new(?![\w-])/', $attributes),
            ];
        }

        preg_match_all('/<h([23])\b[^>]*\bid="([^"]+)"[^>]*>(.*?)<\/h\1>/s', $source, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);

        foreach ($matches as $match) {
            $found[$match[0][1]] = [
                'title' => trim(preg_replace('/\s+/', ' ', strip_tags(preg_replace('/<a\b[^>]*>#<\/a>/', '', $match[3][0])))),
                'id' => $match[2][0],
                'level' => (int) $match[1][0],
                'new' => false,
            ];
        }

        ksort($found);

        return $this->headings[$page['route']] = array_values($found);
    }

    /**
     * The search index: one entry per page plus one per heading.
     */
    public function searchIndex(): array
    {
        $entries = [];

        foreach ($this->pages() as $page) {
            $entries[] = [
                'title' => $page['title'],
                'section' => $page['section'],
                'type' => ($page['group'] ?? null) === 'components' ? 'Component' : 'Page',
                'description' => $page['description'],
                'keywords' => trim(($page['keywords'] ?? '').' '.implode(' ', $page['components'] ?? [])),
                'url' => $page['href'],
            ];

            foreach ($this->headings($page) as $heading) {
                $entries[] = [
                    'title' => $heading['title'],
                    'section' => $page['title'],
                    'type' => 'Section',
                    'description' => null,
                    'keywords' => $page['title'],
                    'url' => $page['href'].'#'.$heading['id'],
                ];
            }

            if (! empty($page['components'])) {
                $entries[] = [
                    'title' => 'API reference',
                    'section' => $page['title'],
                    'type' => 'Section',
                    'description' => null,
                    'keywords' => $page['title'].' props attributes',
                    'url' => $page['href'].'#api-reference',
                ];
            }
        }

        return $entries;
    }

    /**
     * The installed TallCraftUI version, e.g. "v3.0.0-beta.1".
     */
    public function version(): string
    {
        try {
            return InstalledVersions::getPrettyVersion('developermithu/tallcraftui') ?? '3.x';
        } catch (Throwable) {
            return '3.x';
        }
    }

    /**
     * The version without the leading "v", for display next to the logo.
     */
    public function shortVersion(): string
    {
        return ltrim($this->version(), 'v');
    }

    /**
     * GitHub star count, cached for six hours. Null when GitHub can't be reached.
     */
    public function stars(): ?int
    {
        // A failed lookup is cached as 0 so an unreachable API doesn't slow down every request.
        $stars = Cache::remember('docs.github-stars', now()->addHours(6), fn () => rescue(function () {
            $repository = Str::after(config('docs.repository'), 'github.com/');

            return (int) Http::timeout(2)->acceptJson()->get("https://api.github.com/repos/{$repository}")->json('stargazers_count');
        }, 0, report: false));

        return $stars ?: null;
    }

    public function currentVersion(): array
    {
        return collect(config('docs.versions'))->firstWhere('current', true) ?? ['label' => '3.x'];
    }

    /**
     * The Blade tag for a component name, respecting the configured prefix.
     */
    public function tag(string $component): string
    {
        return 'x-'.config('tallcraftui.prefix').$component;
    }

    /**
     * API reference for each component documented on a page, built from the
     * package's component classes so it never drifts from the source.
     */
    public function api(array $page): array
    {
        $map = TallCraftUiServiceProvider::components();

        return collect($page['components'] ?? [])
            ->filter(fn (string $name) => isset($map[$name]))
            ->map(fn (string $name) => $this->describeComponent($name, $map[$name]))
            ->values()
            ->all();
    }

    /**
     * GitHub URL of a component's source file.
     */
    public function sourceUrl(string $component): ?string
    {
        $class = TallCraftUiServiceProvider::components()[$component] ?? null;

        if (! $class) {
            return null;
        }

        $relative = str_replace('\\', '/', Str::after($class, 'Developermithu\\Tallcraftui\\'));

        return config('docs.repository').'/blob/'.config('docs.source_branch').'/src/'.$relative.'.php';
    }

    public function editUrl(array $page): ?string
    {
        if (! isset($page['view'])) {
            return null;
        }

        return config('docs.docs_repository').'/blob/'.config('docs.docs_branch').'/resources/views/'.$page['view'];
    }

    /**
     * Normalize a code snippet from a Blade slot: drop the `('docs')` marker
     * left by `@verbatim('docs')`, remove the common indentation and trim.
     */
    public static function cleanCode(string $code): string
    {
        $code = trim(str_replace("('docs')", '', $code), "\n\r");

        $lines = explode("\n", str_replace("\r\n", "\n", $code));
        $measure = fn (string $line) => strlen($line) - strlen(ltrim($line));

        // Blade trims the start of a slot, so an unindented first line has usually
        // lost its indentation. In that case measure the common indent from the rest.
        $measured = $measure($lines[0]) === 0 ? array_slice($lines, 1) : $lines;
        $measured = array_filter($measured, fn (string $line) => trim($line) !== '');
        $indent = $measured ? min(array_map($measure, $measured)) : 0;

        return trim(implode("\n", array_map(
            fn (string $line) => trim($line) === '' ? '' : rtrim(substr($line, min($indent, $measure($line)))),
            $lines,
        )));
    }

    /**
     * Human-readable name for a code language.
     */
    public static function languageLabel(string $language): string
    {
        return match (strtolower($language)) {
            'blade' => 'Blade',
            'php' => 'PHP',
            'bash', 'shell', 'sh' => 'Terminal',
            'js', 'javascript' => 'JavaScript',
            'json' => 'JSON',
            'css' => 'CSS',
            'env' => '.env',
            'html' => 'HTML',
            default => ucfirst($language),
        };
    }

    private function describeComponent(string $name, string $class): array
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        $source = (string) @file_get_contents($reflection->getFileName());
        $traits = class_uses_recursive($class);

        $props = collect($constructor?->getParameters() ?? [])
            ->map(fn (ReflectionParameter $parameter) => [
                'name' => Str::kebab($parameter->getName()),
                'type' => $this->typeName($parameter),
                'default' => $this->defaultValue($parameter),
            ])
            ->all();

        $colors = $reflection->getDefaultProperties()['colorAttributes'] ?? [];

        $sizes = collect($traits)
            ->filter(fn (string $trait) => str_contains($trait, '\\Sizes\\'))
            ->flatMap(function (string $trait) {
                $file = (string) @file_get_contents((new ReflectionClass($trait))->getFileName());

                if (! preg_match('/\$sizes\s*=\s*\[(.*?)\];/s', $file, $block)) {
                    return [];
                }

                preg_match_all("/'([a-z0-9]+)'\s*=>/", $block[1], $keys);

                return $keys[1];
            })
            ->unique()
            ->values()
            ->all();

        $rounded = str_contains($source, 'BorderRadiusHelper::getRoundedClass')
            ? ['rounded-none', 'rounded-xs', 'rounded-sm', 'rounded-md', 'rounded-lg', 'rounded-xl', 'rounded-2xl', 'rounded-3xl', 'rounded-full']
            : [];

        $config = config("tallcraftui.{$name}");

        return [
            'name' => $name,
            'tag' => $this->tag($name),
            'props' => $props,
            'colors' => $colors,
            'sizes' => $sizes,
            'rounded' => class_exists(BorderRadiusHelper::class) ? $rounded : [],
            'config' => is_array($config) && ! array_is_list($config) ? array_filter($config, 'is_scalar') : [],
            'source' => $this->sourceUrl($name),
        ];
    }

    private function typeName(ReflectionParameter $parameter): string
    {
        $type = $parameter->getType();

        if ($type instanceof ReflectionNamedType) {
            return $type->getName();
        }

        return $type ? ltrim((string) $type, '?') : 'mixed';
    }

    private function defaultValue(ReflectionParameter $parameter): ?string
    {
        if (! $parameter->isDefaultValueAvailable()) {
            return null;
        }

        $value = $parameter->getDefaultValue();

        return match (true) {
            $value === null => 'null',
            is_bool($value) => $value ? 'true' : 'false',
            is_string($value) => "'".$value."'",
            is_array($value) => $value === [] ? '[]' : json_encode($value),
            default => (string) $value,
        };
    }

    private function hydrate(array $page, array $section): array
    {
        $page['section'] = $section['title'];
        $page['group'] = $section['group'] ?? null;
        $page['href'] = Route::has($page['route']) ? route($page['route']) : '#';

        return $page;
    }
}
