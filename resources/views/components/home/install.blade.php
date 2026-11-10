<section class="border-y border-gray-200 bg-gray-50/70 py-20 lg:py-28 dark:border-gray-800 dark:bg-gray-950/30" aria-labelledby="install">
    <div class="container">
        <x-home.section-heading id="install" title="Get started in a minute">
            Works with Laravel 12 and 13, Livewire 4 and Tailwind CSS 4.1. The installer handles the CSS setup for you.
        </x-home.section-heading>

        <ol role="list" class="mt-12 grid grid-cols-1 gap-8 lg:grid-cols-3">
            <li>
                <p class="flex items-center gap-3 font-semibold text-gray-950 dark:text-white">
                    <span class="flex size-7 items-center justify-center rounded-full border border-gray-300 font-mono text-xs dark:border-gray-600">1</span>
                    Require the package
                </p>
                <x-code language="bash" class="mt-4">
                    @verbatim
                        composer require developermithu/tallcraftui
                    @endverbatim
                </x-code>
            </li>
            <li>
                <p class="flex items-center gap-3 font-semibold text-gray-950 dark:text-white">
                    <span class="flex size-7 items-center justify-center rounded-full border border-gray-300 font-mono text-xs dark:border-gray-600">2</span>
                    Run the installer
                </p>
                <x-code language="bash" class="mt-4">
                    @verbatim
                        php artisan install:tallcraftui
                    @endverbatim
                </x-code>
            </li>
            <li>
                <p class="flex items-center gap-3 font-semibold text-gray-950 dark:text-white">
                    <span class="flex size-7 items-center justify-center rounded-full border border-gray-300 font-mono text-xs dark:border-gray-600">3</span>
                    Use a component
                </p>
                <x-code class="mt-4">
                    @verbatim
                        <x-button label="Hello, TallCraftUI" />
                    @endverbatim
                </x-code>
            </li>
        </ol>

        <p class="mt-8 text-[15px] text-gray-600 dark:text-gray-400">
            Using Breeze or Jetstream, or want the details? Read the <a href="{{ route('docs.installation') }}" wire:navigate class="font-medium text-brand-700 underline underline-offset-4 dark:text-brand-300">installation guide</a>.
        </p>
    </div>
</section>
