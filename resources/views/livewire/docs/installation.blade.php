<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Installation - TallCraftUI Docs')] class extends Component
{
    public string $email = '';

    public function save(): void
    {
        $this->validate(['email' => ['required', 'email']]);
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Install TallCraftUI in your Laravel project"
            description="Install TallCraftUI in a Laravel 12 or 13 app with Livewire 4 and Tailwind CSS 4: requirements, the installer, theme colors and your first component." />
    @endslot

    <x-heading title="Installation">
        <x-slot:description>
            Add TallCraftUI to a Laravel app in two commands. The installer publishes the stylesheet and wires it into <code>app.css</code>, so there's no Tailwind config to edit.
        </x-slot:description>
    </x-heading>

    <x-docs.section title="Requirements" step="1">
        <ul>
            <li><a href="https://www.php.net/releases/" target="_blank" rel="noopener">PHP 8.2</a> or later</li>
            <li><a href="https://laravel.com/docs" target="_blank" rel="noopener">Laravel 12 or 13</a></li>
            <li><a href="https://livewire.laravel.com/docs" target="_blank" rel="noopener">Livewire 4</a></li>
            <li><a href="https://tailwindcss.com/docs/installation" target="_blank" rel="noopener">Tailwind CSS 4.1</a> or later, set up with Vite</li>
        </ul>

        <x-docs.callout>
            Alpine.js comes with Livewire. Don't install or start it separately in <code>resources/js/app.js</code>, or you'll see "Detected multiple instances of Alpine running".
            Still on Livewire 3? Use <a href="{{ config('docs.repository') }}/tree/2.x" target="_blank" rel="noopener">TallCraftUI 2.x</a>.
        </x-docs.callout>
    </x-docs.section>

    <x-docs.section title="Install the package" step="2">
        <p>Require TallCraftUI with Composer:</p>

        <x-code language="bash">
            @verbatim
            composer require developermithu/tallcraftui
            @endverbatim

        </x-code>

        <p>3.0 is in beta. Until the stable release, require it with the beta flag:</p>

        <x-code language="bash">
            @verbatim
            composer require developermithu/tallcraftui:^3.0@beta
            @endverbatim

        </x-code>
    </x-docs.section>

    <x-docs.section title="Run the installer" step="3">
        <x-code language="bash">
            @verbatim
            php artisan install:tallcraftui
            @endverbatim

        </x-code>

        <p>The installer:</p>

        <ul>
            <li>publishes <code>resources/css/tallcraftui.css</code>, which registers the component source path for Tailwind and sets default brand colors,</li>
            <li>adds any missing lines to <code>resources/css/app.css</code>, right after your existing <code>@import</code> rules,</li>
            <li>offers to install <code>@tailwindcss/forms</code> with the package manager it finds from your lockfile,</li>
            <li>switches to a <code>tc-</code> component prefix if your app already has components with the same names.</li>
        </ul>

        <p>It only adds what's missing, so it's safe to run again. Afterwards, <code>app.css</code> contains:</p>

        <x-code language="css" filename="resources/css/app.css">
            @verbatim
            @import 'tailwindcss';
            @import './tallcraftui.css';
            @plugin '@tailwindcss/forms';
            @custom-variant dark (&:where(.dark, .dark *));
            @endverbatim

        </x-code>

        <p>
            The <code>@custom-variant</code> line enables class-based dark mode, which <a href="{{ route('docs.components.theme-toggle') }}" wire:navigate>the theme toggle</a> uses.
            Leave it out if dark mode should follow the operating system only.
        </p>
    </x-docs.section>

    <x-docs.section title="Set your brand colors" step="4">
        <p>
            Components use two theme colors, <code>primary</code> and <code>secondary</code>. They default to <code>#6d28d9</code> and <code>#a21caf</code>.
            Define your own in <code>app.css</code> to override them:
        </p>

        <x-code language="css" filename="resources/css/app.css">
            @verbatim
            @theme {
                --color-primary: #0e7c72;
                --color-secondary: #5b61e8;
            }
            @endverbatim

        </x-code>

        <p>Then start Vite:</p>

        <x-code language="bash">
            @verbatim
            npm run dev # or: bun dev
            @endverbatim

        </x-code>
    </x-docs.section>

    <x-docs.section title="Use your first component" step="5">
        <p>
            Components work in any Blade view. Inside a Livewire component, bind them with <code>wire:model</code> like any input.
            Validation errors for the bound property appear under the field automatically. Try submitting this form empty:
        </p>

        <x-code-block>
            @verbatim('docs')
                @php
                    // public string $email = '';
                    // public function save() { $this->validate(['email' => 'required|email']); }
                @endphp

                <form wire:submit="save" class="flex max-w-sm flex-col gap-4" novalidate>
                    <x-input label="Email" type="email" wire:model="email" placeholder="you@example.com" />
                    <x-button label="Subscribe" spinner="save" class="w-fit" />
                </form>
            @endverbatim
        </x-code-block>
    </x-docs.section>

    <x-docs.section title="Existing projects">
        <p>
            Breeze and Jetstream ship their own <code>&lt;x-input&gt;</code>, <code>&lt;x-button&gt;</code> and similar components.
            When the installer finds components with the same names, it publishes <code>config/tallcraftui.php</code> with a <code>tc-</code> prefix to avoid conflicts. Use the components like this:
        </p>

        <x-code>
            @verbatim
                <x-tc-input label="Name" wire:model="name" />
                <x-tc-button label="Save" />
            @endverbatim
        </x-code>

        <p>You can change the prefix any time. See <a href="{{ route('docs.configuration') }}#component-prefix" wire:navigate>component prefix</a>.</p>
    </x-docs.section>

    <x-docs.section title="Next steps">
        <ul>
            <li><a href="{{ route('docs.configuration') }}" wire:navigate>Configuration</a>: change defaults such as button size, modal position or toast timeout.</li>
            <li><a href="{{ route('docs.theming') }}" wire:navigate>Theming</a>: colors, dark mode and overriding styles with classes.</li>
            <li><a href="{{ route('docs.components.button') }}" wire:navigate>Browse the components</a>, starting with Button.</li>
        </ul>
    </x-docs.section>
</div>
