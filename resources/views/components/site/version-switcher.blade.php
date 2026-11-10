@inject('docs', 'App\Support\Docs')

<x-dropdown bottom-start class="w-60 p-1.5 dark:bg-gray-800">
    <x-slot:trigger>
        <button type="button" :aria-expanded="open.toString()" aria-haspopup="true"
            aria-label="TallCraftUI version {{ $docs->shortVersion() }}, switch documentation version"
            class="inline-flex h-7 items-center gap-1 whitespace-nowrap rounded-full border border-gray-200 px-2.5 font-mono text-[11.5px] font-medium text-gray-600 transition-colors hover:border-gray-300 hover:text-gray-950 dark:border-gray-700 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-white">
            v{{ $docs->shortVersion() }}
            <x-icon name="chevron-down" class="size-3" />
        </button>
    </x-slot:trigger>

    <div class="px-2.5 pb-1.5 pt-1 text-xs text-gray-500 dark:text-gray-400">Documentation version</div>

    @foreach (config('docs.versions') as $version)
        <li class="list-none">
            <a href="{{ $version['url'] ?? route('docs') }}" @if ($version['url']) target="_blank" rel="noopener" @else wire:navigate @endif
                @class([
                    'flex items-center justify-between rounded-md px-2.5 py-2 text-sm transition-colors hover:bg-gray-100 dark:hover:bg-white/5',
                    'font-medium text-gray-950 dark:text-white' => $version['current'],
                    'text-gray-600 dark:text-gray-300' => ! $version['current'],
                ])>
                <span>
                    {{ $version['label'] }}
                    <span class="ml-1 text-xs text-gray-500 dark:text-gray-400">{{ $version['note'] }}</span>
                </span>

                @if ($version['current'])
                    <x-icon name="check" class="size-4 text-brand-600 dark:text-brand-400" />
                @else
                    <x-icon name="arrow-up-right" class="size-3.5 text-gray-400" />
                @endif
            </a>
        </li>
    @endforeach

    <div class="my-1.5 border-t border-gray-200 dark:border-gray-700"></div>

    <li class="list-none">
        <a href="{{ route('docs.changelog') }}" wire:navigate class="flex items-center gap-2 rounded-md px-2.5 py-2 text-sm text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-white/5">
            <x-icon name="clock" class="size-4 text-gray-400" />
            Changelog
        </a>
    </li>
</x-dropdown>
