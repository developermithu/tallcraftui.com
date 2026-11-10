@props(['release'])

@php
    $sections = [
        'requirements' => ['Requirements', 'bg-gray-100 text-gray-700 dark:bg-white/10 dark:text-gray-300'],
        'breaking' => ['Breaking changes', 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-300'],
        'added' => ['Added', 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300'],
        'changed' => ['Changed', 'bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300'],
        'deprecated' => ['Deprecated', 'bg-amber-50 text-amber-800 dark:bg-amber-500/10 dark:text-amber-300'],
        'fixed' => ['Fixed', 'bg-violet-50 text-violet-700 dark:bg-violet-500/10 dark:text-violet-300'],
        'security' => ['Security', 'bg-rose-50 text-rose-700 dark:bg-rose-500/10 dark:text-rose-300'],
        'maintenance' => ['Maintenance', 'bg-gray-100 text-gray-600 dark:bg-white/10 dark:text-gray-400'],
    ];
    $id = 'v'.Str::slug($release['version']);
    $markdown = fn (string $text) => Str::inlineMarkdown($text, ['html_input' => 'escape', 'allow_unsafe_links' => false]);
@endphp

<article class="not-prose relative grid grid-cols-1 gap-3 border-t border-gray-200 py-8 first:border-t-0 first:pt-2 md:grid-cols-[9rem_minmax(0,1fr)] md:gap-8 dark:border-gray-800">
    <div class="md:pt-1">
        <time datetime="{{ $release['date'] }}" class="text-sm text-gray-500 dark:text-gray-400">
            {{ \Illuminate\Support\Carbon::parse($release['date'])->format('M j, Y') }}
        </time>
    </div>

    <div class="min-w-0">
        <div class="flex flex-wrap items-center gap-2.5">
            <h3 id="{{ $id }}" class=" font-mono text-lg font-semibold text-gray-950 dark:text-white">
                <a href="#{{ $id }}">v{{ $release['version'] }}</a>
            </h3>

            @if ($release['prerelease'] ?? false)
                <x-badge label="Pre-release" amber sm class="normal-case tracking-normal" />
            @endif

            <a href="{{ config('docs.repository') }}/releases/tag/v{{ $release['version'] }}" target="_blank" rel="noopener"
                class="ml-auto inline-flex items-center gap-1 text-[13px] text-gray-500 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">
                GitHub release
                <x-icon name="arrow-up-right" class="size-3.5" />
            </a>
        </div>

        @isset($release['summary'])
            <p class="mt-2 max-w-[68ch] text-[15px] leading-7 text-gray-700 dark:text-gray-300">{{ $release['summary'] }}</p>
        @endisset

        <div class="mt-4 space-y-5">
            @foreach ($sections as $key => [$label, $classes])
                @if (! empty($release[$key]))
                    <div>
                        <h4 class="inline-flex rounded px-2 py-0.5 text-xs font-semibold {{ $classes }}">{{ $label }}</h4>
                        <ul role="list" class="mt-2.5 space-y-1.5 text-[14.5px] leading-6 text-gray-700 dark:text-gray-300">
                            @foreach ($release[$key] as $item)
                                <li class="relative max-w-[72ch] pl-4 before:absolute before:left-0 before:top-[0.7em] before:size-1.5 before:-translate-y-1/2 before:rounded-full before:bg-gray-300 dark:before:bg-gray-600 [&_code]:code-inline [&_strong]:font-semibold [&_strong]:text-gray-950 dark:[&_strong]:text-white">
                                    {!! $markdown($item) !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</article>
