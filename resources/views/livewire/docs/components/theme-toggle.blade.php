<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Theme toggle - TallCraftUI Components')] class extends Component
{
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Theme Toggle - Dark Mode Switch for Laravel & Livewire | TallCraftUI"
            description="Add a light and dark mode switch to your Laravel app with one Blade tag. The TallCraftUI theme toggle remembers the choice and stays in sync across instances." />
    @endslot

    @slot('content')
        <x-heading title="Theme toggle">
            @slot('description')
                A button that switches between light and dark mode. It stores the choice in <code>localStorage</code>, falls back to the operating system setting and keeps every toggle on the page in sync.
            @endslot
        </x-heading>

        <x-docs.callout title="Requires class-based dark mode">
            The toggle adds or removes the <code>dark</code> class on <code>&lt;html&gt;</code>. Make sure <code>app.css</code> contains
            <code>@custom-variant dark (&amp;:where(.dark, .dark *));</code>. The installer adds it for you. See <a href="{{ route('docs.theming') }}#dark-mode" wire:navigate>dark mode</a>.
        </x-docs.callout>

        <x-code-block title="Basic usage" inline>
            @slot('description')
                <p>Click it: the whole site switches, including the toggle in the header.</p>
            @endslot

            @verbatim('docs')
                <x-theme-toggle />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize the toggle" inline>
            @slot('description')
                <p>Style the button with <code>class</code> and each icon with <code>class:icon-light</code> and <code>class:icon-dark</code>.</p>
            @endslot

            @verbatim('docs')
                <x-theme-toggle class="rounded-md border border-gray-200 dark:border-gray-700" />

                <x-theme-toggle
                    class="size-12 bg-gray-100 dark:bg-gray-800"
                    class:icon-light="size-6 text-amber-500"
                    class:icon-dark="size-6 text-indigo-400"
                />
            @endverbatim
        </x-code-block>

        <x-code-block title="React to theme changes" no-render language="blade">
            @slot('description')
                <p>
                    Each toggle dispatches a <code>tallcraftui-theme-changed</code> window event with <code>detail.dark</code>.
                    Listen for it to update charts, maps or anything else that doesn't use Tailwind classes.
                </p>
            @endslot

            @verbatim('docs')
                <div x-data="{ dark: document.documentElement.classList.contains('dark') }"
                     @tallcraftui-theme-changed.window="dark = $event.detail.dark">
                    <span x-text="dark ? 'Dark mode' : 'Light mode'"></span>
                </div>
            @endverbatim
        </x-code-block>

        <x-code-block title="Avoid a flash of the wrong theme" no-render language="html">
            @slot('description')
                <p>The toggle applies the saved theme as soon as it renders. To apply it before the first paint, add this script to your layout's <code>&lt;head&gt;</code>:</p>
            @endslot

            @verbatim('docs')
                <script>
                    if (localStorage.getItem('dark-mode') === 'true' ||
                        (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.documentElement.classList.add('dark');
                    }
                </script>
            @endverbatim
        </x-code-block>
    @endslot
</div>
