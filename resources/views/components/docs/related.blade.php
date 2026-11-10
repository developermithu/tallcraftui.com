@props(['page'])

@inject('docs', 'App\Support\Docs')

@php $related = $docs->related($page); @endphp

@if ($related->isNotEmpty())
    <section class="mt-14">
        <h2 id="related-components" class=" text-[1.4rem] font-semibold tracking-tight">Related components</h2>

        <ul role="list" class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($related as $item)
                <li>
                    <a href="{{ $item['href'] }}" wire:navigate
                        class="flex h-full flex-col rounded-[var(--radius-panel)] border border-gray-200 p-4 transition-colors hover:border-gray-300 hover:bg-gray-50 dark:border-gray-800 dark:hover:border-gray-700 dark:hover:bg-white/[0.03]">
                        <span class="font-medium text-gray-950 dark:text-white">{{ $item['title'] }}</span>
                        <span class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $item['description'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@endif
