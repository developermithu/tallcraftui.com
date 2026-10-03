<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Checkbox components - Tallcraftui')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Checkbox Form Components for Laravel & TailwindCSS - TallCraftUI"
            description="Create accessible and customizable checkbox components with TallCraftUI. Features multiple styles, colors, alignments, and hint support." />
    @endslot

    @slot('content')
        <x-heading title="Checkbox" subtitle="Form Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-checkbox />
                <x-checkbox label="Label *" />
                <x-checkbox label="Label *" hint="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, quia." />
            @endverbatim
        </x-code-block>

        <x-code-block title="Alignment">
            @verbatim('docs')
                <x-checkbox label="Text right" />
                <x-checkbox label="Text left" text-left />
                <x-checkbox label="Text left" hint="Lorem ipsum dolor adipisicing elit. Ullam, quia." text-left />
            @endverbatim
        </x-code-block>

        <x-code-block title="Color variants" inline>
            @verbatim('docs')
                <x-checkbox label="Primary" checked />
                <x-checkbox label="Secondary" checked secondary />
                <x-checkbox label="Black" checked black />
                <x-checkbox label="White" checked white />
                <x-checkbox label="Slate" checked slate />
                <x-checkbox label="Zinc" checked zinc />
                <x-checkbox label="Gray" checked gray />
                <x-checkbox label="Neutral" checked neutral />
                <x-checkbox label="Stone" checked stone />
                <x-checkbox label="Red" checked red />
                <x-checkbox label="Orange" checked orange />
                <x-checkbox label="Amber" checked amber />
                <x-checkbox label="Yellow" checked yellow />
                <x-checkbox label="Lime" checked lime />
                <x-checkbox label="Green" checked green />
                <x-checkbox label="Emerald" checked emerald />
                <x-checkbox label="Teal" checked teal />
                <x-checkbox label="Cyan" checked cyan />
                <x-checkbox label="Sky" checked sky />
                <x-checkbox label="Blue" checked blue />
                <x-checkbox label="Indigo" checked Indigo />
                <x-checkbox label="Violet" checked violet />
                <x-checkbox label="Purple" checked purple />
                <x-checkbox label="Fuchsia" checked fuchsia />
                <x-checkbox label="Pink" checked pink />
                <x-checkbox label="Rose" checked rose />
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants" inline>
            @verbatim('docs')
                <x-checkbox checked sm />
                <x-checkbox checked />
                <x-checkbox checked lg />
                <x-checkbox checked xl />
                <x-checkbox checked 2xl />
            @endverbatim
        </x-code-block>

        <x-code-block title="Rounded corner" inline>
            @verbatim('docs')
                <x-checkbox lg checked label="none" rounded-none />
                <x-checkbox lg checked label="sm" rounded-sm />
                <x-checkbox lg checked label="Default" />
                <x-checkbox lg checked label="md" rounded-md />
                <x-checkbox lg checked label="lg" rounded-lg />
                <x-checkbox lg checked label="xl" rounded-xl />
                <x-checkbox lg checked label="2xl" rounded-2xl />
                <x-checkbox lg checked label="3xl" rounded-3xl />
                <x-checkbox lg checked label="full" rounded-full />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Alignment" />
            <x-on-this-page.item title="Color variants" />
            <x-on-this-page.item title="Size variants" />
            <x-on-this-page.item title="Rounded corner" />
        </x-on-this-page>
    @endslot
</div>
