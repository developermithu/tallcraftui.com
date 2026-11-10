@props(['headings' => []])

<nav x-data="docsToc(@js(collect($headings)->pluck('id')))" class="text-[13px]">
    <h2 class="font-semibold text-gray-950 dark:text-white">On this page</h2>

    <ul role="list" class="mt-3 space-y-0.5 border-l border-gray-200 dark:border-gray-800">
        @foreach ($headings as $heading)
            <li>
                <a href="#{{ $heading['id'] }}"
                    :class="active === @js($heading['id'])
                        ? 'border-brand-600 text-gray-950 font-medium dark:border-brand-400 dark:text-white'
                        : 'border-transparent text-gray-500 hover:text-gray-900 hover:border-gray-400 dark:text-gray-400 dark:hover:text-gray-200'"
                    :aria-current="active === @js($heading['id']) ? 'location' : null"
                    @class([
                        '-ml-px flex items-center gap-2 border-l py-1 leading-5 transition-colors',
                        'pl-3' => $heading['level'] === 2,
                        'pl-6' => $heading['level'] === 3,
                        'border-transparent text-gray-500 dark:text-gray-400',
                    ])>
                    {{ $heading['title'] }}

                    @if ($heading['new'])
                        <span class="rounded-full bg-brand-100 px-1.5 text-[10px] font-semibold text-brand-800 dark:bg-brand-400/15 dark:text-brand-200">New</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>

    <a href="#main-content" class="mt-6 inline-flex items-center gap-1.5 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <x-icon name="arrow-up" class="size-3.5" />
        Back to top
    </a>
</nav>
