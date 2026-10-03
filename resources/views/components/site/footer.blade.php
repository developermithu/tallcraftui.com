@inject('docs', 'App\Support\Docs')

<footer class="border-t border-gray-200 dark:border-gray-800">
    <div class="container grid gap-10 py-12 md:grid-cols-[1.4fr_repeat(3,1fr)] lg:py-14">
        <div class="max-w-xs">
            <x-site.logo />
            <p class="mt-4 text-sm leading-6 text-gray-600 dark:text-gray-400">
                Blade UI components for Laravel, Livewire, Alpine.js and Tailwind CSS. Free and open source under the MIT license.
            </p>
        </div>

        <nav aria-label="Documentation">
            <h2 class="text-sm font-semibold">Docs</h2>
            <ul role="list" class="mt-3 space-y-2 text-sm">
                @foreach (['docs' => 'Introduction', 'docs.installation' => 'Installation', 'docs.configuration' => 'Configuration', 'docs.theming' => 'Theming', 'docs.upgrading' => 'Upgrade guide'] as $route => $label)
                    <li><a href="{{ route($route) }}" wire:navigate class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">{{ $label }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav aria-label="Components">
            <h2 class="text-sm font-semibold">Components</h2>
            <ul role="list" class="mt-3 space-y-2 text-sm">
                @foreach ($docs->componentSections() as $section)
                    <li><a href="{{ $section['pages'][0]['href'] }}" wire:navigate class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">{{ $section['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav aria-label="Community">
            <h2 class="text-sm font-semibold">Community</h2>
            <ul role="list" class="mt-3 space-y-2 text-sm">
                <li><a href="{{ config('docs.repository') }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">GitHub</a></li>
                <li><a href="{{ config('docs.discord') }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">Discord</a></li>
                <li><a href="{{ config('docs.repository') }}/issues" target="_blank" rel="noopener" class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">Report an issue</a></li>
                <li><a href="{{ route('docs.changelog') }}" wire:navigate class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">Changelog</a></li>
                <li><a href="{{ route('docs.contribution') }}" wire:navigate class="text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">Contributing</a></li>
            </ul>
        </nav>
    </div>

    <div class="border-t border-gray-200 dark:border-gray-800">
        <div class="container flex flex-col gap-2 py-6 text-[13px] text-gray-500 sm:flex-row sm:items-center sm:justify-between dark:text-gray-400">
            <p>&copy; {{ date('Y') }} TallCraftUI. Released under the MIT license.</p>
            <p>This site is built with TallCraftUI {{ $docs->shortVersion() }}, Laravel and Livewire.</p>
        </div>
    </div>
</footer>
