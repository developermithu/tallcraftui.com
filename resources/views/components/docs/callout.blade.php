{{-- Note, tip or warning inside documentation prose. Supports links and inline code in the slot. --}}
@props(['type' => 'note', 'title' => null])

@php
    [$classes, $iconClasses, $icon, $defaultTitle] = match ($type) {
        'warning' => ['border-amber-200 bg-amber-50/70 dark:border-amber-500/20 dark:bg-amber-500/[0.06]', 'text-amber-600 dark:text-amber-400', 'exclamation-triangle', 'Heads up'],
        'tip' => ['border-brand-200 bg-brand-50/70 dark:border-brand-400/20 dark:bg-brand-400/[0.06]', 'text-brand-600 dark:text-brand-400', 'light-bulb', 'Tip'],
        'danger' => ['border-red-200 bg-red-50/70 dark:border-red-500/20 dark:bg-red-500/[0.06]', 'text-red-600 dark:text-red-400', 'x-circle', 'Important'],
        default => ['border-sky-200 bg-sky-50/70 dark:border-sky-500/20 dark:bg-sky-500/[0.06]', 'text-sky-600 dark:text-sky-400', 'information-circle', 'Note'],
    };
@endphp

<aside {{ $attributes->class(['not-prose flex gap-3 rounded-[var(--radius-panel)] border p-4', $classes]) }}>
    <x-icon :name="$icon" class="mt-0.5 size-5 shrink-0 {{ $iconClasses }}" />

    <div class="min-w-0 text-[14.5px] leading-6 text-gray-700 dark:text-gray-300 [&_a]:font-medium [&_a]:text-gray-950 [&_a]:underline [&_a]:underline-offset-2 dark:[&_a]:text-white [&_code]:code-inline">
        <p class="font-semibold text-gray-950 dark:text-white">{{ $title ?? $defaultTitle }}</p>
        <div class="mt-1">{{ $slot }}</div>
    </div>
</aside>
