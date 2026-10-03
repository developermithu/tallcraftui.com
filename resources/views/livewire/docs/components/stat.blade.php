<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Stat components - Tallcraftui')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Stat components - Tallcraftui" description="Stat components - Tallcraftui" />
    @endslot

    @slot('content')
        <x-heading title="Stat" subtitle="UI Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-stat icon="users" title="Total users" number="10,500" />
                <x-stat icon="users" title="Total users" number="10,500" tooltip increase="12.5%" />
                <x-stat icon="users" title="Total users" number="10,500" tooltip="User decrease" decrease="5%" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Icon right" inline>
            @verbatim('docs')
                <x-stat icon-right="users" title="Total users" number="10,500" class="w-56" />
                <x-stat icon-right="users" title="Total users" number="10,500" tooltip increase class="w-64" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Color variants" inline>
            @slot('description')
                Available all tailwind css colors including <strong>primary</strong> and <strong>secondary</strong> color.
            @endslot
            
            @verbatim('docs')
                <x-stat icon-right="users" title="Total users" number="10,500" class="w-56" primary />
                <x-stat icon-right="users" title="Total users" number="10,500" class="w-56" amber />
                <x-stat icon-right="users" title="Total users" number="10,500" class="w-56" rose />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customization" inline>
            @verbatim('docs')
                <x-stat icon="users" title="Total users" number="10,500" class="w-56 shadow-md shadow-gray-200" rounded-none />
            @endverbatim
        </x-code-block>

    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Icon right" />
            <x-on-this-page.item title="Color variants" />
            <x-on-this-page.item title="Customization" />
        </x-on-this-page>
    @endslot
</div>
