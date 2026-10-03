@inject('docs', 'App\Support\Docs')

@php
    $stars = $docs->stars();
    $releases = count(require resource_path('data/changelog.php'));
@endphp

<section class="container py-20 lg:py-28" aria-labelledby="open-source">
    <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center">
        <div>
            <x-home.section-heading id="open-source" title="Open source, built in the open">
                TallCraftUI is free and MIT licensed. Report bugs, suggest components and send pull requests on GitHub, or ask questions on Discord.
            </x-home.section-heading>

            <div class="mt-8 flex flex-wrap gap-3">
                <x-button link="{{ config('docs.repository') }}" external white data-pan="github-star-button" class="border-gray-300 bg-white normal-case tracking-normal text-gray-900 hover:bg-gray-50 dark:border-gray-700 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
                    <x-site.github-icon class="size-4" />
                    Star on GitHub
                </x-button>
                <x-button link="{{ config('docs.discord') }}" external flat gray class="text-gray-700 hover:text-gray-950 dark:text-gray-300 dark:hover:text-white normal-case tracking-normal">
                    <x-site.discord-icon class="size-4" />
                    Join Discord
                </x-button>
                <x-button :link="route('docs.contribution')" label="Contribute" flat gray class="text-gray-700 hover:text-gray-950 dark:text-gray-300 dark:hover:text-white normal-case tracking-normal" />
            </div>
        </div>

        <dl class="grid grid-cols-2 gap-px overflow-hidden rounded-[var(--radius-frame)] border border-gray-200 bg-gray-200 dark:border-gray-800 dark:bg-gray-800">
            @foreach (array_filter([
                $stars ? [number_format($stars), 'GitHub stars'] : null,
                [$docs->componentPages()->count(), 'Components'],
                [$releases, 'Releases since July 2024'],
                ['MIT', 'License'],
            ]) as [$value, $label])
                <div class="bg-white p-6 dark:bg-gray-900">
                    <dt class="text-sm text-gray-500 dark:text-gray-400">{{ $label }}</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight tabular-nums text-gray-950 dark:text-white" style="font-stretch: 88%">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </div>

    <div class="mt-20 rounded-[var(--radius-frame)] bg-gray-950 px-6 py-14 sm:px-12 lg:mt-28 lg:py-16 dark:bg-white/[0.04] dark:ring-1 dark:ring-white/10">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl">
                <h2 class="text-title text-white">Build your next Laravel interface with TallCraftUI.</h2>
                <p class="mt-4 text-[17px] leading-7 text-gray-400">Install it in two commands and start with the components you need.</p>
            </div>

            <div class="flex shrink-0 flex-col gap-3 sm:flex-row">
                <x-button :link="route('docs.installation')" label="Read the docs" icon-right="arrow-right"
                    class="h-11 justify-center bg-white px-5 text-sm normal-case tracking-normal text-gray-950 hover:bg-gray-100 focus:ring-white" />
                <x-button link="{{ config('docs.repository') }}" external
                    class="h-11 justify-center border-white/20 bg-transparent px-5 text-sm normal-case tracking-normal text-white hover:bg-white/10">
                    <x-site.github-icon class="size-4" />
                    View on GitHub
                </x-button>
            </div>
        </div>
    </div>
</section>
