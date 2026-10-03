@inject('docs', 'App\Support\Docs')

<nav {{ $attributes->class('text-sm') }} x-data
    x-init="$nextTick(() => {
        const active = $el.querySelector('[aria-current=page]');
        const scroller = $el.closest('.overflow-y-auto');
        if (!active || !scroller) return;
        const item = active.getBoundingClientRect(), box = scroller.getBoundingClientRect();
        if (item.bottom > box.bottom || item.top < box.top) scroller.scrollTop += item.top - box.top - box.height / 2;
    })">
    @php $previousGroup = null; @endphp

    @foreach ($docs->sections() as $section)
        @if (($section['group'] ?? null) === 'components' && $previousGroup !== 'components')
            <p class="mt-9 px-3 text-xs font-medium text-gray-500 dark:text-gray-400">Components</p>
        @endif

        @php $previousGroup = $section['group'] ?? null; @endphp

        <div @class(['mt-8' => ! $loop->first && $previousGroup !== 'components', 'mt-5' => $previousGroup === 'components'])>
            <h2 class="px-3 text-[13px] font-semibold text-gray-950 dark:text-white">
                {{ $section['title'] }}
            </h2>

            <ul role="list" class="mt-2 space-y-px">
                @foreach ($section['pages'] as $item)
                    @php $active = $docs->isActive($item); @endphp

                    <li>
                        <a href="{{ $item['href'] }}" wire:navigate @if ($active) aria-current="page" @endif
                            @class([
                                'group flex items-center justify-between gap-2 rounded-md px-3 py-1.5 transition-colors',
                                'bg-brand-50 font-medium text-brand-700 dark:bg-brand-400/10 dark:text-brand-300' => $active,
                                'text-gray-600 hover:bg-gray-100 hover:text-gray-950 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white' => ! $active,
                            ])>
                            <span>{{ $item['title'] }}</span>

                            @isset($item['badge'])
                                <span class="rounded-full bg-brand-100 px-1.5 py-px text-[10px] font-semibold text-brand-800 dark:bg-brand-400/15 dark:text-brand-200">
                                    {{ $item['badge'] }}
                                </span>
                            @endisset
                        </a>
                    </li>
                @endforeach

                @if ($section['title'] === 'Resources')
                    <li>
                        <a href="{{ config('docs.repository') }}" target="_blank" rel="noopener"
                            class="flex items-center justify-between gap-2 rounded-md px-3 py-1.5 text-gray-600 transition-colors hover:bg-gray-100 hover:text-gray-950 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white">
                            GitHub
                            <x-icon name="arrow-up-right" class="size-3.5 text-gray-400" />
                        </a>
                    </li>
                    <li>
                        <a href="{{ config('docs.discord') }}" target="_blank" rel="noopener"
                            class="flex items-center justify-between gap-2 rounded-md px-3 py-1.5 text-gray-600 transition-colors hover:bg-gray-100 hover:text-gray-950 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white">
                            Discord
                            <x-icon name="arrow-up-right" class="size-3.5 text-gray-400" />
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    @endforeach
</nav>
