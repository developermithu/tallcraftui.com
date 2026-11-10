@props(['page'])

@inject('docs', 'App\Support\Docs')

@php
    $previous = $docs->previous($page);
    $next = $docs->next($page);
@endphp

@if ($previous || $next)
    <nav aria-label="Previous and next pages" class="mt-16 grid gap-3 sm:grid-cols-2">
        @if ($previous)
            <a href="{{ $previous['href'] }}" wire:navigate
                class="group flex flex-col rounded-[var(--radius-panel)] border border-gray-200 px-4 py-3 transition-colors hover:border-gray-300 hover:bg-gray-50 dark:border-gray-800 dark:hover:border-gray-700 dark:hover:bg-white/[0.03]">
                <span class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                    <x-icon name="arrow-left" class="size-3" /> Previous
                </span>
                <span class="mt-0.5 font-medium text-gray-950 dark:text-white">{{ $previous['title'] }}</span>
            </a>
        @else
            <span class="hidden sm:block"></span>
        @endif

        @if ($next)
            <a href="{{ $next['href'] }}" wire:navigate
                class="group flex flex-col items-end rounded-[var(--radius-panel)] border border-gray-200 px-4 py-3 text-right transition-colors hover:border-gray-300 hover:bg-gray-50 dark:border-gray-800 dark:hover:border-gray-700 dark:hover:bg-white/[0.03]">
                <span class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                    Next <x-icon name="arrow-right" class="size-3" />
                </span>
                <span class="mt-0.5 font-medium text-gray-950 dark:text-white">{{ $next['title'] }}</span>
            </a>
        @endif
    </nav>
@endif
