<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Toggle components - Tallcraftui')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Toggle Switch Components for Laravel & TailwindCSS | TallCraftUI" 
            description="Implement intuitive toggle switches with customizable sizes, colors, and labels." 
            keywords="Laravel toggle switches, TailwindCSS toggle, switch components, boolean inputs, form controls, Laravel UI components, interactive toggles"
        />
    @endslot

    @slot('content')
        <x-heading title="Toggle" subtitle="Form Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-toggle />
                <x-toggle label="Label" />
                <x-toggle label="Label *" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Text left" new>
            @verbatim('docs')
                <x-toggle label="Label" text-left />
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants" inline new>
            @verbatim('docs')
                <x-toggle checked sm />
                <x-toggle checked md /> {{-- default --}}
                <x-toggle checked lg />
            @endverbatim
        </x-code-block>

        <x-code-block title="Color variants" inline new>
            @verbatim('docs')
                <x-toggle checked />
                <x-toggle checked secondary />
                <x-toggle checked slate />
                <x-toggle checked zinc />
                <x-toggle checked gray />
                <x-toggle checked neutral />
                <x-toggle checked stone />
                <x-toggle checked red />
                <x-toggle checked orange />
                <x-toggle checked amber />
                <x-toggle checked yellow />
                <x-toggle checked lime />
                <x-toggle checked green />
                <x-toggle checked emerald />
                <x-toggle checked teal />
                <x-toggle checked cyan />
                <x-toggle checked sky />
                <x-toggle checked blue />
                <x-toggle checked Indigo />
                <x-toggle checked violet />
                <x-toggle checked purple />
                <x-toggle checked fuchsia />
                <x-toggle checked pink />
                <x-toggle checked rose />
                <x-toggle checked black />
                <x-toggle checked white />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize toggle" new>
            @slot('description')
                You can easily customize any <strong>toggle</strong> using standard <code>css</code> classes.
            @endslot
            
            @verbatim('docs')
                <x-toggle class="peer-focus:ring-4 ring-offset-0" checked />
                <x-toggle class="w-16 h-8 after:h-7 after:w-7 after:start-[4px] peer-focus:ring-0 ring-offset-0 peer-focus:ring-blue-600 dark:peer-focus:ring-blue-600 peer-checked:bg-blue-600" checked />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Text left" />
            <x-on-this-page.item title="Size variants" />
            <x-on-this-page.item title="Color variants" />
            <x-on-this-page.item title="Customize toggle" />
        </x-on-this-page>
    @endslot
</div>
