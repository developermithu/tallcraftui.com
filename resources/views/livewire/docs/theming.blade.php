<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Theming - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Theming TallCraftUI: colors, dark mode and custom styles"
            description="Set primary and secondary colors with Tailwind CSS 4 theme variables, enable class-based dark mode and override any TallCraftUI component style with Tailwind classes." />
    @endslot

    <x-heading title="Theming">
        <x-slot:description>
            TallCraftUI is styled with Tailwind CSS, so theming uses the tools you already know: theme variables for colors, a dark variant for dark mode and utility classes for everything else.
        </x-slot:description>
    </x-heading>

    <x-docs.section title="Brand colors">
        <p>
            Components that use your brand color, such as the default button, badge and focus rings, read two Tailwind theme colors: <code>primary</code> and <code>secondary</code>.
            The published <code>tallcraftui.css</code> sets defaults (<code>#6d28d9</code> and <code>#a21caf</code>). Your own values always take precedence:
        </p>

        <x-code language="css" filename="resources/css/app.css">
            @verbatim
                @import 'tailwindcss';
                @import './tallcraftui.css';

                @theme {
                    --color-primary: #0e7c72;
                    --color-secondary: #5b61e8;
                }
            @endverbatim
        </x-code>

        <x-docs.callout type="tip" title="Check contrast">
            Buttons put white text on <code>primary</code>. Pick a shade that keeps a contrast ratio of at least 4.5:1 with white, so labels stay readable.
        </x-docs.callout>
    </x-docs.section>

    <x-docs.section title="Color attributes">
        <p>
            Components with color variants accept any Tailwind color name as a bare attribute, from <code>slate</code> to <code>rose</code>, plus <code>primary</code>, <code>secondary</code>, <code>black</code> and <code>white</code>.
            The API reference on each component page lists the colors it supports.
        </p>

        <x-code-block inline>
            @verbatim('docs')
                <x-button label="Primary" />
                <x-button label="Secondary" secondary />
                <x-button label="Rose" rose />
                <x-badge label="Emerald" emerald />
                <x-badge label="Sky" sky outline />
                <x-toggle label="Amber" amber checked />
            @endverbatim
        </x-code-block>
    </x-docs.section>

    <x-docs.section title="Dark mode">
        <p>
            Every component ships with dark styles. TallCraftUI uses class-based dark mode: add <code>dark</code> to the <code>&lt;html&gt;</code> element and components switch.
            The installer adds the variant to <code>app.css</code>:
        </p>

        <x-code language="css" filename="resources/css/app.css">
            @verbatim
                @custom-variant dark (&:where(.dark, .dark *));
            @endverbatim
        </x-code>

        <p>
            Drop in <a href="{{ route('docs.components.theme-toggle') }}" wire:navigate><code>&lt;x-theme-toggle /&gt;</code></a> to let people switch. It saves the choice in <code>localStorage</code> and falls back to the operating system setting.
            To apply the saved theme before the page first paints, add this to your layout's <code>&lt;head&gt;</code>:
        </p>

        <x-code language="html" filename="resources/views/components/layouts/app.blade.php">
            @verbatim
                <script>
                    if (localStorage.getItem('dark-mode') === 'true' ||
                        (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.documentElement.classList.add('dark');
                    }
                </script>
            @endverbatim
        </x-code>

        <p>If you'd rather follow the operating system only, leave out the <code>@custom-variant</code> line and Tailwind's default media-query dark mode applies.</p>
    </x-docs.section>

    <x-docs.section title="Override styles with classes">
        <p>
            Classes you pass to a component are merged with its own classes using <a href="https://github.com/gehrisandro/tailwind-merge-php" target="_blank" rel="noopener">tailwind-merge</a>.
            When two classes conflict, yours wins, so you can change one detail without rewriting the rest:
        </p>

        <x-code-block inline>
            @verbatim('docs')
                <x-button label="Default" />
                <x-button label="Pill, no caps" class="rounded-full px-6 normal-case tracking-normal" />
                <x-button label="Full width" class="w-full sm:w-64" />
            @endverbatim
        </x-code-block>
    </x-docs.section>

    <x-docs.section title="Style inner elements">
        <p>
            Some components are made of several elements. Target one with a <code>class:</code> attribute, for example <code>class:icon</code> or <code>class:label</code>:
        </p>

        <x-code-block>
            @verbatim('docs')
                <x-input label="Search" icon="magnifying-glass" placeholder="Find a component"
                    class:label="text-xs font-semibold text-gray-500"
                    class:icon="text-teal-600" />
            @endverbatim
        </x-code-block>

        <p>Available targets, read from the component source:</p>

        <div class="not-prose overflow-x-auto rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
            <table class="w-full min-w-[28rem] text-left text-sm">
                <thead class="bg-gray-50 text-gray-900 dark:bg-white/[0.03] dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Attribute</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Components</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 dark:divide-gray-800 dark:text-gray-400">
                    @foreach ([
                        'class:label' => 'Input, Password, Textarea, Select, Native select, Checkbox, Radio, Toggle, Range, Color picker, Rating, Markdown',
                        'class:icon' => 'Button, Badge, Input, Password, Color picker, Dropdown, Dropdown item, Menu, Menu item, Breadcrumb item, Tab item, Accordion item, Separator, Not found',
                        'class:title' => 'Dropdown, Menu, Separator, Toast',
                        'class:badge' => 'Avatar, Dropdown item, Menu item',
                        'class:content' => 'Tooltip, Tab, Accordion item',
                        'class:items' => 'Tab',
                        'class:description' => 'Toast',
                        'class:close-icon' => 'Toast',
                        'class:icon-light / class:icon-dark' => 'Theme toggle',
                    ] as $attribute => $components)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2.5 font-mono text-[13px] font-medium text-gray-950 dark:text-white">{{ $attribute }}</td>
                            <td class="px-4 py-2.5">{{ $components }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-docs.section>

    <x-docs.section title="Change defaults globally">
        <p>
            To change a default everywhere, such as making every button large or every modal centered, use the
            <a href="{{ route('docs.configuration') }}#component-defaults" wire:navigate>component defaults</a> in <code>config/tallcraftui.php</code> instead of repeating attributes.
        </p>
    </x-docs.section>
</div>
