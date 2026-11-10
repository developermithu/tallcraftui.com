@inject('docs', 'App\Support\Docs')

@php
    $page = $docs->current();

    if (request()->routeIs('home')) {
        $data = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebSite',
                    'name' => 'TallCraftUI',
                    'url' => $docs->canonicalUrl('/'),
                ],
                [
                    '@type' => 'SoftwareSourceCode',
                    'name' => 'TallCraftUI',
                    'description' => 'Blade UI component library for Laravel, Livewire, Alpine.js and Tailwind CSS.',
                    'codeRepository' => config('docs.repository'),
                    'programmingLanguage' => ['PHP', 'Blade'],
                    'runtimePlatform' => 'Laravel',
                    'license' => 'https://opensource.org/licenses/MIT',
                    'version' => $docs->shortVersion(),
                    'author' => ['@type' => 'Person', 'name' => 'developermithu', 'url' => 'https://github.com/developermithu'],
                ],
            ],
        ];
    } elseif ($page) {
        $position = 0;
        $crumbs = collect(['Home' => route('home')] + $docs->breadcrumbs($page))
            ->map(fn ($url) => $url ? $docs->canonicalUrl($url).(parse_url($url, PHP_URL_FRAGMENT) ? '#'.parse_url($url, PHP_URL_FRAGMENT) : '') : null)
            ->map(function ($url, $label) use (&$position, $page, $docs) {
                return array_filter([
                    '@type' => 'ListItem',
                    'position' => ++$position,
                    'name' => $label,
                    'item' => $url ?? ($label === $page['title'] ? $docs->canonicalUrl($page['href']) : null),
                ]);
            })
            ->values();

        $data = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'TechArticle',
                    'headline' => $page['title'],
                    'description' => $page['description'],
                    'url' => $docs->canonicalUrl($page['href']),
                    'isPartOf' => ['@type' => 'WebSite', 'name' => 'TallCraftUI', 'url' => $docs->canonicalUrl('/')],
                    'proficiencyLevel' => 'Beginner',
                ],
                [
                    '@type' => 'BreadcrumbList',
                    'itemListElement' => $crumbs,
                ],
            ],
        ];
    }
@endphp

@isset($data)
    <script type="application/ld+json">{!! json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
@endisset
