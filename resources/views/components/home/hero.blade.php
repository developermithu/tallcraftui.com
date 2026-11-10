@inject('docs', 'App\Support\Docs')

<section class="relative overflow-hidden border-b border-gray-200 dark:border-gray-800">
    {{-- Faint grid, fading out towards the bottom --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-[linear-gradient(to_right,var(--color-gray-100)_1px,transparent_1px),linear-gradient(to_bottom,var(--color-gray-100)_1px,transparent_1px)] bg-[size:48px_48px] [mask-image:linear-gradient(to_bottom,black,transparent_70%)] dark:bg-[linear-gradient(to_right,rgb(255_255_255/0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgb(255_255_255/0.04)_1px,transparent_1px)]"></div>

    <div class="container pb-16 pt-12 sm:pt-16 lg:pb-24">
        <div class="max-w-5xl">
            <a href="{{ route('docs.changelog') }}" wire:navigate
                class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white py-1 pl-1 pr-3 text-[13px] text-gray-600 transition-colors hover:border-gray-300 hover:text-gray-950 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-white">
                <span class="rounded-full bg-brand-600 px-2 py-0.5 text-[11px] font-semibold text-white">v{{ $docs->shortVersion() }}</span>
                Livewire 4 and Laravel 13 support
                <x-icon name="chevron-right" class="size-3.5 text-gray-400" />
            </a>

            <h1 class="mt-6 text-display text-gray-950 dark:text-white">
                Build beautiful Laravel interfaces with less boilerplate.
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-gray-600 dark:text-gray-400">
                TallCraftUI is a library of {{ $docs->componentPages()->count() }} Blade components for Laravel, Livewire, Alpine.js and Tailwind CSS.
                Inputs that show their own validation errors, tables that search and sort, modals and toasts: one tag each.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                <x-button data-pan="get-started-button" :link="route('docs.installation')" label="Get started" icon-right="arrow-right"
                    class="h-11 w-full justify-center px-5 text-sm normal-case tracking-normal sm:w-fit" />
                <x-button :link="route('docs').'#components'" label="Browse components" white
                    class="h-11 w-full justify-center border-gray-300 bg-white px-5 sm:w-fit text-sm normal-case tracking-normal text-gray-900 hover:bg-gray-50 dark:border-gray-700 dark:bg-white/5 dark:text-white dark:hover:bg-white/10" />
                <x-button data-pan="view-github-button" link="{{ config('docs.repository') }}" external flat gray
                    class="text-gray-700 hover:text-gray-950 dark:text-gray-300 dark:hover:text-white h-11 w-full justify-center px-4 sm:w-fit text-sm normal-case tracking-normal">
                    <x-site.github-icon class="size-4" />
                    GitHub
                </x-button>
            </div>

            <div x-data="docsCode('composer require developermithu/tallcraftui')"
                class="mt-8 flex max-w-md items-center gap-3 rounded-md border border-gray-200 bg-gray-50 py-1.5 pl-4 pr-1.5 font-mono text-[13px] text-gray-700 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-300">
                <span class="select-none text-gray-400">$</span>
                <span class="truncate">composer require developermithu/tallcraftui</span>
                <button type="button" @click="copy()" :aria-label="copied ? 'Copied' : 'Copy install command'"
                    class="ml-auto inline-flex size-8 shrink-0 items-center justify-center rounded text-gray-500 hover:bg-gray-200 hover:text-gray-950 dark:hover:bg-white/10 dark:hover:text-white">
                    <x-icon name="clipboard" class="size-4" x-show="!copied" />
                    <x-icon name="check" class="size-4 text-brand-600 dark:text-brand-400" x-show="copied" x-cloak />
                </button>
            </div>
        </div>

        <x-home.hero-preview class="mt-12 lg:mt-14" />
    </div>
</section>
