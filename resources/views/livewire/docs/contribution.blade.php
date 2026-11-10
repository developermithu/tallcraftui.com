<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Contributing - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Contribute to TallCraftUI"
            description="Set up a local copy of TallCraftUI inside a Laravel app, make changes to the Blade components and open a pull request on GitHub." />
    @endslot

    <x-heading title="Contributing">
        <x-slot:description>
            Bug fixes, new components and documentation improvements are welcome. Work on TallCraftUI inside a Laravel app so you can see your changes as you make them.
        </x-slot:description>
    </x-heading>

    <x-docs.section title="Clone the repository" step="1">
        <p>In the root of a Laravel app with Livewire 4 and Tailwind CSS 4, create a <code>packages</code> folder and clone TallCraftUI into it:</p>

        <x-code language="bash">
            @verbatim
                mkdir packages
                git clone https://github.com/developermithu/tallcraftui.git packages/tallcraftui
            @endverbatim
        </x-code>

        <p>Fork the repository first if you plan to open a pull request, and clone your fork instead.</p>
    </x-docs.section>

    <x-docs.section title="Link the local package" step="2">
        <p>Add a path repository to the app's <code>composer.json</code> and allow development versions:</p>

        <x-code language="json" filename="composer.json">
            @verbatim
                "minimum-stability": "dev",
                "prefer-stable": true,
                "repositories": {
                    "developermithu/tallcraftui": {
                        "type": "path",
                        "url": "packages/tallcraftui",
                        "options": {
                            "symlink": true
                        }
                    }
                },
            @endverbatim
        </x-code>

        <p>Then require the package. Composer symlinks <code>vendor/developermithu/tallcraftui</code> to your clone:</p>

        <x-code language="bash">
            @verbatim
                composer require developermithu/tallcraftui:@dev
                php artisan install:tallcraftui
            @endverbatim
        </x-code>
    </x-docs.section>

    <x-docs.section title="Start the dev server" step="3">
        <p>
            The published <code>tallcraftui.css</code> tells Tailwind to scan <code>vendor/developermithu/tallcraftui/src</code>, which now points at your clone, so new classes in components are picked up automatically.
        </p>

        <x-code language="bash">
            @verbatim
                npm run dev # or: bun dev
            @endverbatim
        </x-code>

        <p>Components live in <code>src/View/Components</code>. After changing a component class, run <code>php artisan view:clear</code> if the change doesn't show up.</p>
    </x-docs.section>

    <x-docs.section title="Open a pull request" step="4">
        <ul>
            <li>Format PHP with Laravel Pint: <code>vendor/bin/pint</code>.</li>
            <li>Keep each pull request focused on one change and describe how you tested it.</li>
            <li>For new components or larger changes, <a href="{{ config('docs.repository') }}/issues" target="_blank" rel="noopener">open an issue</a> first to discuss the API.</li>
        </ul>

        <p>
            Improving these docs? The documentation site is open source too:
            <a href="{{ config('docs.docs_repository') }}" target="_blank" rel="noopener">developermithu/tallcraftui.com</a>.
            Every page has an "Edit this page on GitHub" link at the bottom.
        </p>
    </x-docs.section>
</div>
