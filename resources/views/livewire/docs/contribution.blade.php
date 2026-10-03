<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('How to contribute - Tallcraftui')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="How to contribute - Tallcraftui" description="How to contribute Tallcraftui" />
    @endslot

    <x-slot name="content">
        <x-heading title="How to Contribute" subtitle="Contribution Guide" />

        <ol class="list-decimal">
            <li>
                Create a new folder <code>package</code> into the <strong>root</strong> of your existing laravel project
            </li>

            <li>
                Clone the repository into <code>package</code> folder

                <x-code language="bash">
                    @verbatim
                        git clone https://github.com/developermithu/tallcraftui.git
                    @endverbatim
                </x-code>
            </li>

            <li>
                Modify <code>composer.json</code>

                <x-code language="json">
                    @verbatim
                // Change `stable` to `dev`
                "minimum-stability": "dev",
                
                // Add this 
                "repositories": {
                    "developermithu/tallcraftui": {
                        "type": "path",
                        "url": "package/tallcraftui",
                        "options": {
                            "symlink": true
                        }
                    }
                },
                    @endverbatim
                </x-code>
            </li>

            <li>
                Require the package for <strong>local symlink</strong>

                <x-code language="bash">
                    @verbatim
                        composer require developermithu/tallcraftui
                    @endverbatim
                </x-code>
            </li>

            <li>
                Edit the <code>tailwind.config.js</code> inserting this content

                <x-code language="js">
                    @verbatim
                export default {
                    content: [
                        // ...
                        
                        "./vendor/developermithu/tallcraftui/src/**/*.php",
                    ],
                };
                    @endverbatim
                </x-code>
            </li>

            <li>
                Start the developmemt server

                <x-code language="bash">
                    @verbatim
                        bun dev
                    @endverbatim
                </x-code>
            </li>
        </ol>
    </x-slot>
</div>
