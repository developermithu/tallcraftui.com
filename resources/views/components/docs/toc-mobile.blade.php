@props(['headings' => []])

<div x-data="{ open: false, ...docsToc(@js(collect($headings)->pluck('id'))) }" @keydown.escape="open = false"
    @click.outside="open = false"
    class="sticky top-16 z-30 -mx-4 border-b border-gray-200 bg-white/95 px-4 backdrop-blur-sm sm:-mx-6 sm:px-6 xl:hidden dark:border-gray-800 dark:bg-gray-900/95">
    <button type="button" @click="open = !open" :aria-expanded="open" aria-controls="mobile-toc"
        class="flex w-full items-center justify-between gap-3 py-3 text-left text-sm">
        <span class="flex min-w-0 items-center gap-2">
            <span class="font-medium text-gray-950 dark:text-white">On this page</span>
            <span class="truncate text-gray-500 dark:text-gray-400" x-text="titles[active] ?? ''"></span>
        </span>
        <x-icon name="chevron-down" class="size-4 shrink-0 text-gray-500 transition" ::class="open && 'rotate-180'" />
    </button>

    <ul id="mobile-toc" role="list" x-show="open" x-cloak x-transition.opacity.duration.150ms
        class="absolute inset-x-0 top-full max-h-[60vh] overflow-y-auto border-b border-gray-200 bg-white px-4 py-3 shadow-float sm:px-6 dark:border-gray-800 dark:bg-gray-900">
        @foreach ($headings as $heading)
            <li x-init="titles[@js($heading['id'])] = @js($heading['title'])">
                <a href="#{{ $heading['id'] }}" @click="open = false"
                    :class="active === @js($heading['id']) ? 'text-brand-700 font-medium dark:text-brand-300' : 'text-gray-600 dark:text-gray-400'"
                    @class(['block py-1.5 text-sm', 'pl-4' => $heading['level'] === 3])>
                    {{ $heading['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
