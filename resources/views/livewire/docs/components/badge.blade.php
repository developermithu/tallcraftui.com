<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Badge components - Tallcraftui')] class extends Component {

}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Badge Components for Laravel & TailwindCSS - TallCraftUI"
            description="Create eye-catching badge components with TallCraftUI. Features customizable styles, colors, icons, and sizes for status indicators, notifications, and labels." />
    @endslot

    @slot('content')
        <x-heading title="Badge" subtitle="UI Components">
            @slot('description')
                You can easily customize any <strong>badge</strong> using standard <code>css</code> classes and <strong>icon</strong> using the <code>class:icon</code> attribute.
            @endslot
        </x-heading>

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-badge label="Primary" />
                <x-badge label="Secondary" secondary />
                <x-badge label="Black" black />
                <x-badge label="White" white />
                <x-badge label="Slate" slate />
                <x-badge label="Zinc" zinc />
                <x-badge label="Gray" gray />
                <x-badge label="Neutral" neutral />
                <x-badge label="Stone" stone />
                <x-badge label="Red" red />
                <x-badge label="Orange" orange />
                <x-badge label="Amber" amber />
                <x-badge label="Yellow" yellow />
                <x-badge label="Lime" lime />
                <x-badge label="Green" green />
                <x-badge label="Emerald" emerald />
                <x-badge label="Teal" teal />
                <x-badge label="Cyan" cyan />
                <x-badge label="Sky" sky />
                <x-badge label="Blue" blue />
                <x-badge label="Indigo" Indigo />
                <x-badge label="Violet" violet />
                <x-badge label="Purple" purple />
                <x-badge label="Fuchsia" fuchsia />
                <x-badge label="Pink" pink />
                <x-badge label="Rose" rose />
            @endverbatim
        </x-code-block>

        <x-code-block title="Outline badges" inline>
            @verbatim('docs')
                <x-badge label="Primary" outline />
                <x-badge label="Secondary" secondary outline />
                <x-badge label="Black" black outline />
                <x-badge label="White" white outline />
                <x-badge label="Slate" slate outline />
                <x-badge label="Zinc" zinc outline />
                <x-badge label="Gray" gray outline />
                <x-badge label="Neutral" neutral outline />
                <x-badge label="Stone" stone outline />
                <x-badge label="Red" red outline />
                <x-badge label="Orange" orange outline />
                <x-badge label="Amber" amber outline />
                <x-badge label="Yellow" yellow outline />
                <x-badge label="Lime" lime outline />
                <x-badge label="Green" green outline />
                <x-badge label="Emerald" emerald outline />
                <x-badge label="Teal" teal outline />
                <x-badge label="Cyan" cyan outline />
                <x-badge label="Sky" sky outline />
                <x-badge label="Blue" blue outline />
                <x-badge label="Indigo" Indigo outline />
                <x-badge label="Violet" violet outline />
                <x-badge label="Purple" purple outline />
                <x-badge label="Fuchsia" fuchsia outline />
                <x-badge label="Pink" pink outline />
                <x-badge label="Rose" rose outline />
            @endverbatim
        </x-code-block>

        <x-code-block title="Badge with icon" inline>
            @verbatim('docs')
                <x-badge label="Home" icon="home" purple />
                <x-badge label="Delete" icon="trash" red />
                <x-badge label="View" icon="eye" gray />
                <x-badge label="Edit" icon="pencil-square" amber />
                <x-badge label="Save" icon="bookmark-square" green />
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom slot" new>
            @verbatim('docs')
                <x-badge>
                    Custom slot
                </x-badge>
            @endverbatim
        </x-code-block>

        <x-code-block title="Badge size" inline>
            @verbatim('docs')
                <x-badge label="Badge" sm />
                <x-badge label="Badge" md />
                <x-badge label="Badge" lg />
                <x-badge label="Badge" xl />
                <x-badge label="Badge" 2xl />
            @endverbatim
        </x-code-block>
        
        <x-code-block title="Rounded corner" inline>
            @verbatim('docs')
                <x-badge label="Rounded none" rounded-none />
                <x-badge label="Rounded sm" rounded-sm />
                <x-badge label="Rounded Default" />
                <x-badge label="Rounded md" rounded-md />
                <x-badge label="Rounded lg" rounded-lg />
                <x-badge label="Rounded xl" rounded-xl />
                <x-badge label="Rounded 2xl" rounded-2xl />
                <x-badge label="Rounded 3xl" rounded-3xl />
                <x-badge label="Rounded full" rounded-full />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Outline badges" />
            <x-on-this-page.item title="Badge with icon" />
            <x-on-this-page.item title="Custom slot" new />
            <x-on-this-page.item title="Size variants" />
            <x-on-this-page.item title="Rounded corner" />
        </x-on-this-page>
    @endslot
</div>
