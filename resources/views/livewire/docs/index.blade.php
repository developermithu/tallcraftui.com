<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Introduction - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @inject('docs', 'App\Support\Docs')

    @slot('metaTags')
        <x-meta-tags title="TallCraftUI Documentation - Blade UI components for Laravel and Livewire"
            description="Learn how to install, configure and use TallCraftUI, a Blade UI component library for Laravel, Livewire, Alpine.js and Tailwind CSS." />
    @endslot

    <x-heading title="Introduction">
        <x-slot:description>
            TallCraftUI is a library of Blade components for Laravel apps built with Livewire, Alpine.js and Tailwind CSS.
            Write <code>&lt;x-input label="Email" wire:model="email" /&gt;</code> and get a labelled, styled input that shows its own validation errors.
        </x-slot:description>
    </x-heading>

    <div class="not-prose">
        <button type="button" @click="$dispatch('open-search')"
            class="flex h-12 w-full items-center gap-3 rounded-[var(--radius-panel)] border border-gray-200 bg-white px-4 text-left text-[15px] text-gray-500 shadow-xs transition-colors hover:border-gray-300 dark:border-gray-700 dark:bg-white/[0.03] dark:text-gray-400 dark:hover:border-gray-600">
            <x-icon name="magnifying-glass" class="size-5" />
            Search the docs: components, props, examples
            <span class="ml-auto hidden gap-0.5 sm:flex"><kbd class="kbd">/</kbd></span>
        </button>
    </div>

    <x-docs.section title="Quick start">
        <p>
            TallCraftUI {{ $docs->shortVersion() }} needs PHP 8.2+, Laravel 12 or 13, Livewire 4 and Tailwind CSS 4.1+.
            Install the package, then run the installer. It publishes the stylesheet and adds the lines TallCraftUI needs to <code>resources/css/app.css</code>.
        </p>

        <x-code language="bash">
            composer require developermithu/tallcraftui
            php artisan install:tallcraftui
        </x-code>

        <p>Start Vite with <code>npm run dev</code> or <code>bun dev</code>, then use any component in a Blade or Livewire view:</p>

        <x-code-block>
            @verbatim('docs')
                <x-input label="Email" type="email" placeholder="you@example.com" />
                <x-button label="Save changes" class="w-fit" />
            @endverbatim
        </x-code-block>

        <p>
            The <a href="{{ route('docs.installation') }}" wire:navigate>installation guide</a> covers each step in detail, including apps that already use Breeze or Jetstream.
        </p>
    </x-docs.section>

    <x-docs.section title="Components">
        <p>{{ $docs->componentPages()->count() }} components, grouped by what they do. Every page has live examples, copyable code and an API reference.</p>

        <div id="components" class="not-prose grid gap-3 sm:grid-cols-2">
            @foreach ($docs->componentSections() as $section)
                <div class="rounded-[var(--radius-panel)] border border-gray-200 p-5 dark:border-gray-800">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="flex items-center gap-2 font-semibold text-gray-950 dark:text-white">
                            <x-icon :name="$section['icon']" class="size-[18px] text-brand-600 dark:text-brand-400" />
                            {{ $section['title'] }}
                        </h3>
                        <span class="text-xs tabular-nums text-gray-500 dark:text-gray-400">{{ count($section['pages']) }}</span>
                    </div>

                    <p class="mt-1.5 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $section['description'] }}</p>

                    <ul role="list" class="mt-4 flex flex-wrap gap-1.5">
                        @foreach ($section['pages'] as $item)
                            <li>
                                <a href="{{ $item['href'] }}" wire:navigate
                                    class="inline-flex rounded-md border border-gray-200 px-2 py-1 text-[13px] text-gray-700 transition-colors hover:border-brand-300 hover:bg-brand-50 hover:text-brand-800 dark:border-gray-700 dark:text-gray-300 dark:hover:border-brand-400/40 dark:hover:bg-brand-400/10 dark:hover:text-brand-200">
                                    {{ $item['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </x-docs.section>

    <x-docs.section title="Popular components">
        <ul role="list" class="not-prose grid gap-px overflow-hidden rounded-[var(--radius-panel)] border border-gray-200 bg-gray-200 sm:grid-cols-2 dark:border-gray-800 dark:bg-gray-800">
            @foreach ($docs->popular() as $item)
                <li class="bg-white dark:bg-gray-900">
                    <a href="{{ $item['href'] }}" wire:navigate class="group flex h-full flex-col p-4 transition-colors hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                        <span class="flex items-center justify-between font-medium text-gray-950 dark:text-white">
                            {{ $item['title'] }}
                            <span class="font-mono text-xs font-normal text-gray-400">&lt;{{ $docs->tag($item['components'][0]) }}&gt;</span>
                        </span>
                        <span class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $item['description'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </x-docs.section>

    <x-docs.section title="Guides">
        <ul role="list" class="not-prose grid gap-3 sm:grid-cols-2">
            @foreach (['docs.installation', 'docs.configuration', 'docs.theming', 'docs.upgrading'] as $route)
                @php $item = $docs->find($route); @endphp
                <li>
                    <a href="{{ $item['href'] }}" wire:navigate
                        class="flex h-full gap-4 rounded-[var(--radius-panel)] border border-gray-200 p-4 transition-colors hover:border-gray-300 hover:bg-gray-50 dark:border-gray-800 dark:hover:border-gray-700 dark:hover:bg-white/[0.03]">
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-md bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-gray-300">
                            <x-icon :name="$item['icon']" class="size-[18px]" />
                        </span>
                        <span>
                            <span class="block font-medium text-gray-950 dark:text-white">{{ $item['title'] }}</span>
                            <span class="mt-0.5 block text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $item['description'] }}</span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </x-docs.section>

    <x-docs.section title="Supported versions">
        <div class="not-prose overflow-x-auto rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
            <table class="w-full min-w-[32rem] text-left text-sm">
                <thead class="bg-gray-50 text-gray-900 dark:bg-white/[0.03] dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-2.5 font-semibold">TallCraftUI</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">PHP</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Laravel</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Livewire</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Tailwind CSS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 dark:divide-gray-800 dark:text-gray-400">
                    <tr>
                        <td class="px-4 py-2.5 font-medium text-gray-950 dark:text-white">3.x <x-badge label="Beta" amber sm class="ml-1 normal-case" /></td>
                        <td class="px-4 py-2.5">8.2+</td>
                        <td class="px-4 py-2.5">12, 13</td>
                        <td class="px-4 py-2.5">4</td>
                        <td class="px-4 py-2.5">4.1+</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2.5 font-medium text-gray-950 dark:text-white">2.x</td>
                        <td class="px-4 py-2.5">8.1+</td>
                        <td class="px-4 py-2.5">10, 11, 12</td>
                        <td class="px-4 py-2.5">3</td>
                        <td class="px-4 py-2.5">4</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p>2.x receives bug fixes only. Alpine.js ships with Livewire, so don't install it separately.</p>
    </x-docs.section>

    <x-docs.section title="Get help">
        <p>
            Found a bug or missing feature? <a href="{{ config('docs.repository') }}/issues" target="_blank" rel="noopener">Open an issue on GitHub</a>.
            For questions, join the <a href="{{ config('docs.discord') }}" target="_blank" rel="noopener">Discord community</a>.
            Every release is listed in the <a href="{{ route('docs.changelog') }}" wire:navigate>changelog</a>.
        </p>
    </x-docs.section>
</div>
