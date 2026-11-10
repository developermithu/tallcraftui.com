<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Validate};

new 
#[Layout('components.layouts.app')] 
#[Title('Progress - TallCraftUI Components')] 
class extends Component {

}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Progress Component for Laravel & Tailwind CSS - TallCraftUI"
            description="Progress Component - Track and Display Progress Bars, Circles, and Indicators with Tailwind CSS."
        />
    @endslot

    <x-heading title="Progress" subtitle="UI Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
            <x-progress value="50" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Divided format">
        @verbatim('docs')
            <x-progress value="50" divided-format />
        @endverbatim
    </x-code-block>

    <x-code-block title="Without value">
        @verbatim('docs')
            <x-progress value="50" without-value />
        @endverbatim
    </x-code-block>

    <x-code-block title="With label">
        @verbatim('docs')
                <x-progress value="50" label="Percentage" />
                <x-progress value="50" label="Divided" divided-format />
        @endverbatim
    </x-code-block>

    <x-code-block title="Label position">
        @verbatim('docs')
                <x-progress value="50" label="Top" label-position="top" /> 
                <x-progress value="50" label="Bottom" label-position="bottom" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Size variants">
        @verbatim('docs')
                <x-progress value="50" xs />
                <x-progress value="50" sm />
                <x-progress value="50" md /> {{-- default --}}
                <x-progress value="50" lg />
                <x-progress value="50" xl />
                <x-progress value="50" 2xl />
        @endverbatim
    </x-code-block>

    <x-code-block title="Color variants">
        @verbatim('docs')
                <x-progress value="50" />
                <x-progress value="50" black />
                <x-progress value="50" slate />
                <x-progress value="50" zinc />
                <x-progress value="50" gray />
                <x-progress value="50" neutral />
                <x-progress value="50" stone />
                <x-progress value="50" red />
                <x-progress value="50" orange />
                <x-progress value="50" amber />
                <x-progress value="50" yellow />
                <x-progress value="50" lime />
                <x-progress value="50" green />
                <x-progress value="50" emerald />
                <x-progress value="50" teal />
                <x-progress value="50" cyan />
                <x-progress value="50" sky />
                <x-progress value="50" blue />
                <x-progress value="50" indigo />
                <x-progress value="50" violet />
                <x-progress value="50" purple />
                <x-progress value="50" fuchsia />
                <x-progress value="50" pink />                
                <x-progress value="50" rose />
        @endverbatim
    </x-code-block>

</div>
