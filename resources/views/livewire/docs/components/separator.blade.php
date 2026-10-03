<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Separator - TallCraftUI Components')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Separator components - Tallcraftui" description="Separator components - Tallcraftui" />
    @endslot

    @slot('content')
        <x-heading title="Separator" subtitle="UI Components" />

        <x-code-block language="html" title="Basic usage">
            @verbatim('docs')
                <ul class="flex flex-col w-full sm:w-1/2">
                    <li>PHP</li>                
                    <x-separator />
                    <li>Laravel</li>
                    <x-separator />
                    <li>Livewire</li>
                </ul>
            @endverbatim
        </x-code-block>

        <x-code-block language="html" title="Customization">
            @verbatim('docs')
                <ul class="flex flex-col w-full sm:w-1/2">
                    <li>PHP</li>                
                    <x-separator class="my-3 h-0.5 bg-primary dark:bg-primary" />
                    <li>Laravel</li>
                    <x-separator class="my-3 h-0.5 bg-primary dark:bg-primary" />
                    <li>Livewire</li>
                </ul>
            @endverbatim
        </x-code-block>
    @endslot

</div>

