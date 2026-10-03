@inject('docs', 'App\Support\Docs')

<section class="container py-20 lg:py-28" aria-labelledby="components">
    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <x-home.section-heading id="components" title="{{ $docs->componentPages()->count() }} components, grouped by job">
            From form inputs to data tables. Each one has live examples, copyable code and an API reference.
        </x-home.section-heading>

        <x-button :link="route('docs').'#components'" label="View all components" icon-right="arrow-right" white
            class="shrink-0 border-gray-300 bg-white normal-case tracking-normal text-gray-900 hover:bg-gray-50 dark:border-gray-700 dark:bg-white/5 dark:text-white dark:hover:bg-white/10" />
    </div>

    <div class="mt-12 grid gap-px overflow-hidden rounded-[var(--radius-frame)] border border-gray-200 bg-gray-200 sm:grid-cols-2 lg:grid-cols-3 dark:border-gray-800 dark:bg-gray-800">
        @foreach ($docs->componentSections() as $section)
            <div class="bg-white p-6 dark:bg-gray-900">
                <h3 class="flex items-center gap-2 font-semibold text-gray-950 dark:text-white">
                    <x-icon :name="$section['icon']" class="size-5 text-brand-600 dark:text-brand-400" />
                    {{ $section['title'] }}
                    <span class="ml-auto text-xs font-normal tabular-nums text-gray-500 dark:text-gray-400">{{ count($section['pages']) }}</span>
                </h3>
                <p class="mt-1.5 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $section['description'] }}</p>

                <ul role="list" class="mt-4 flex flex-wrap gap-x-4 gap-y-1.5 text-sm">
                    @foreach ($section['pages'] as $item)
                        <li>
                            <a href="{{ $item['href'] }}" wire:navigate class="text-gray-700 underline decoration-gray-300 underline-offset-4 hover:text-gray-950 hover:decoration-brand-500 dark:text-gray-300 dark:decoration-gray-600 dark:hover:text-white">{{ $item['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</section>
