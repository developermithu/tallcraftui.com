<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Upgrading to V2 - Tallcraftui')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Upgrading TallCraftUI to V2 - Step-by-Step Guide"
            description="Follow this guide to smoothly upgrade your TallCraftUI installation from v1 to v2. Includes requirements, installation steps, and notes on breaking changes." />
    @endslot

    <x-slot name="content">
        <x-heading title="Upgrading to V2" subtitle="TallCraftUI">
            @slot('description')
                This guide will help you upgrade from <a href="https://v1-tallcraftui.developermithu.com" target="_blank" class="text-primary hover:underline">TallCraftUI v1</a> to v2.
                <br>
                <strong>Tip:</strong> Use <strong>git</strong> to track your changes during the upgrade.
                <br>
                If you encounter any issues, join our <a href="https://discord.gg/gmFTB9YRV6" target="_blank">Discord</a>
                community or open an <a href="https://github.com/developermithu/tallcraftui/issues" target="_blank">issue on
                    GitHub</a>.
            @endslot
        </x-heading>

        <div class="space-y-5">
            <h2 id="requirements" class="pt-5 group">
                <a href="#requirements"
                    class="absolute -ml-8 no-underline transition opacity-0 group-hover:opacity-70">#</a>
                Requirements
            </h2>

            <ul class="pl-4 space-y-1 text-teal-500 list-disc">
                <li><a href="https://laravel.com/docs/11.x" target="_blank">Laravel 10 or later</a></li>
                <li><a href="https://livewire.laravel.com" target="_blank">Livewire 3.x</a></li>
                <li><a href="https://tailwindcss.com" target="_blank">TailwindCSS 4.x</a></li>
            </ul>

            <p>
                Follow these steps to upgrade your project from TallCraftUI v1 to v2.
            </p>
        </div>

        <x-code-block no-render language="bash" title="Upgrade Tailwind CSS">
            @slot('description')
                <p>
                    <strong>TallCraftUI v2</strong> requires <strong>Tailwind CSS 4.x</strong>. If you are using an older
                    version, you must upgrade Tailwind first.
                </p>

                <p>Run the following command to upgrade Tailwind CSS:</p>
            @endslot

            @verbatim('docs')
                npx @tailwindcss/upgrade
            @endverbatim
        </x-code-block>

        <p>
            For more details, refer to the official <a href="https://tailwindcss.com/docs/upgrade-guide" target="_blank"
                rel="noopener">Tailwind CSS upgrade guide</a>.
        </p>

        <x-code-block no-render language="bash" title="Install TallCraftUI V2">
            @slot('description')
                <p>Update your <strong>composer.json</strong> to require TallCraftUI v2 and run the installation command:</p>
            @endslot

            @verbatim('docs')
                composer require developermithu/tallcraftui:^2.0
                php artisan install:tallcraftui
            @endverbatim
        </x-code-block>

        <x-code-block no-render language="bash" title="Update Configuration File">
            @slot('description')
                <p>
                    Remove the old configuration file <code>config/tallcraftui.php</code> and publish the new one.
                </p>
            @endslot

            @verbatim('docs')
                rm config/tallcraftui.php
                php artisan vendor:publish --tag=tallcraftui-config
            @endverbatim
        </x-code-block>

        <p>
            Review the newly published <code>config/tallcraftui.php</code> file for any new configuration
            options or changes.
        </p>

        <x-code-block no-render language="bash" title="Clear View Cache">
            @slot('description')
                <p>Clear the Laravel view cache to ensure your application uses the updated components:</p>
            @endslot

            @verbatim('docs')
                php artisan view:clear
            @endverbatim
        </x-code-block>

        <x-code-block no-render title="Update Component Usage (Breaking Change)">
            @slot('description')
                <p>
                    The <code>&lt;x-select&gt;</code> component from v1 has been renamed to
                    <code>&lt;x-native-select&gt;</code> in v2 to avoid conflicts with a new, enhanced
                    <code>&lt;x-select&gt;</code> component.
                </p>

                <p>
                    You need to update your code wherever you used the old select component:
                </p>
            @endslot

            @verbatim('docs')
                <!-- Before (v1) -->
                <x-select wire:model="country" ... />

                <!-- After (v2) -->
                <x-native-select wire:model="country" ... />

                <!-- New v2 Select (Optional) -->
                <x-select wire:model="user_id" ... />
            @endverbatim
        </x-code-block>

        <p>
            The new <code>&lt;x-select&gt;</code> component
            offers more features (like multiple options select and custom styling) and has a different API.
        </p>
    </x-slot>

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Requirements" />
            <x-on-this-page.item title="Upgrade Tailwind CSS" />
            <x-on-this-page.item title="Install TallCraftUI V2" />
            <x-on-this-page.item title="Update Configuration File" />
            <x-on-this-page.item title="Clear View Cache" />
            <x-on-this-page.item title="Update Component Usage (Breaking Change)" />
        </x-on-this-page>
    @endslot
</div>
