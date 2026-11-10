@props(['docs' => false])

@inject('registry', 'App\Support\Docs')

@php
    $route = request()->route()?->getName() ?? '';
    $links = [
        ['label' => 'Docs', 'href' => route('docs'), 'active' => str_starts_with($route, 'docs') && ! str_starts_with($route, 'docs.components') && $route !== 'docs.changelog'],
        ['label' => 'Components', 'href' => route('docs.components.button'), 'active' => str_starts_with($route, 'docs.components')],
        ['label' => 'Changelog', 'href' => route('docs.changelog'), 'active' => $route === 'docs.changelog'],
    ];
    $stars = $registry->stars();
@endphp

<header x-data class="sticky top-0 z-40 border-b border-gray-200/80 bg-white/90 backdrop-blur-md supports-[backdrop-filter]:bg-white/80 dark:border-gray-800 dark:bg-gray-900/90 dark:supports-[backdrop-filter]:bg-gray-900/80">
    <div class="container flex h-16 items-center gap-3">
        <button type="button" @click="$dispatch('open-mobile-nav')"
            class="-ml-2 inline-flex size-9 items-center justify-center rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-950 lg:hidden dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white"
            aria-label="Open navigation">
            <x-icon name="bars-3" class="size-5" />
        </button>

        <x-site.logo />

        <div class="hidden sm:block">
            <x-site.version-switcher />
        </div>

        <nav class="ml-6 hidden items-center gap-1 lg:flex" aria-label="Main">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}" wire:navigate @if ($link['active']) aria-current="page" @endif
                    @class([
                        'rounded-md px-3 py-1.5 text-sm font-medium transition-colors',
                        'text-gray-950 dark:text-white' => $link['active'],
                        'text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white' => ! $link['active'],
                    ])>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="ml-auto flex items-center gap-1 sm:gap-1.5">
            <button type="button" @click="$dispatch('open-search')" @mouseenter.once="$dispatch('prefetch-search')"
                @focus.once="$dispatch('prefetch-search')"
                class="hidden h-9 w-56 items-center gap-2 rounded-md border border-gray-200 bg-gray-50 pl-3 pr-1.5 text-sm text-gray-500 transition-colors hover:border-gray-300 hover:text-gray-700 lg:flex xl:w-72 dark:border-gray-700 dark:bg-white/[0.03] dark:text-gray-400 dark:hover:border-gray-600 dark:hover:text-gray-200"
                aria-label="Search documentation">
                <x-icon name="magnifying-glass" class="size-4" />
                <span>Search docs</span>
                <span class="ml-auto flex gap-0.5" aria-hidden="true">
                    <kbd class="kbd" x-data x-text="/Mac|iPhone|iPad/.test(navigator.platform) ? '⌘' : 'Ctrl'">⌘</kbd>
                    <kbd class="kbd">K</kbd>
                </span>
            </button>

            <button type="button" @click="$dispatch('open-search')"
                class="inline-flex size-9 items-center justify-center rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-950 lg:hidden dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white"
                aria-label="Search documentation">
                <x-icon name="magnifying-glass" class="size-5" />
            </button>

            <a href="{{ config('docs.repository') }}" target="_blank" rel="noopener" data-pan="github-link"
                class="inline-flex h-9 items-center gap-2 rounded-md px-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-950 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white"
                aria-label="TallCraftUI on GitHub{{ $stars ? ', '.number_format($stars).' stars' : '' }}">
                <x-site.github-icon class="size-[18px]" />
                @if ($stars)
                    <span class="hidden tabular-nums sm:inline">{{ $stars >= 1000 ? round($stars / 1000, 1).'k' : $stars }}</span>
                @endif
            </a>

            <a href="{{ config('docs.discord') }}" target="_blank" rel="noopener" data-pan="discord-link"
                class="hidden size-9 items-center justify-center rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-950 sm:inline-flex dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white"
                aria-label="Join the TallCraftUI Discord">
                <x-site.discord-icon class="size-[18px]" />
            </a>

            <x-theme-toggle data-pan="toggle-theme-switch"
                class="size-9 rounded-md p-2 text-gray-600 hover:bg-gray-100 xxs:size-9 xxs:p-2 dark:ring-0 dark:hover:bg-white/5"
                class:icon-light="size-5 text-gray-600 dark:text-gray-300"
                class:icon-dark="size-5 text-gray-600 dark:text-gray-300" />
        </div>
    </div>
</header>
