<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Validate};

new 
#[Layout('components.layouts.app')] 
#[Title('Range Slider components - Tallcraftui')] 
class extends Component {
    #[Validate('required|gt:0')]
    public int $level = 25;

    #[Validate('required|gt:20')]
    public int $level2 = 30;

    #[Validate('required|gt:200')]
    public int $level3 = 250;
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Range Slider Component for Laravel & Tailwind CSS - TallCraftUI" 
            description="Explore the versatile and customizable range input component from TallCraftUI. Easily apply dynamic colors for thumb, progress, and track using Laravel and Tailwind CSS." 
            keywords="Laravel range component, Tailwind CSS range input, customizable range input, TallCraftUI range slider, dynamic range slider, responsive range component, Laravel Blade UI components, interactive range slider, TailwindCSS range slider"
        />
    @endslot

    <x-heading title="Range Slider" subtitle="Form Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                @php
                    // #[Validate('required|gt:0')]
                    // public int $level = 25;
                @endphp 

                <x-range wire:model="level" label="Level *" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Range limit and Step">
        @slot('description')
            <p>Selected level: <strong>{{ $level2 }}</strong></p>
            <p>Selected step: <strong>{{ $level3 }}</strong></p>
        @endslot

        @verbatim('docs')
                @php
                    // #[Validate('required|gt:20')]
                    // public int $level2 = 30;

                    // #[Validate('required|gt:200')]
                    // public int $level3 = 250;
                @endphp 

                <x-range 
                    wire:model.live="level2" 
                    min="0"
                    max="100"
                    label="Level *" 
                    hint="Select level between 0 and 100" 
                />

                <x-range 
                    wire:model.live="level3" 
                    min="100"
                    max="500"
                    step="50"
                    label="Step" 
                    hint="Increment by 50" 
                />
        @endverbatim
    </x-code-block>

    <x-code-block title="Color variants">
        @verbatim('docs')
                <x-range label="Default" />
                <x-range label="Black" black />
                <x-range label="Slate" slate />
                <x-range label="Zinc" zinc />
                <x-range label="Gray" gray />
                <x-range label="Neutral" neutral />
                <x-range label="Stone" stone />
                <x-range label="Red" red />
                <x-range label="Orange" orange />
                <x-range label="Amber" amber />
                <x-range label="Yellow" yellow />
                <x-range label="Lime" lime />
                <x-range label="Green" green />
                <x-range label="Emerald" emerald />
                <x-range label="Teal" teal />
                <x-range label="Cyan" cyan />
                <x-range label="Sky" sky />
                <x-range label="Blue" blue />
                <x-range label="Indigo" Indigo />
                <x-range label="Violet" violet />
                <x-range label="Purple" purple />
                <x-range label="Fuchsia" fuchsia />
                <x-range label="Pink" pink />
                <x-range label="Rose" rose />
        @endverbatim
    </x-code-block>

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Range limit and Step" />
            <x-on-this-page.item title="Color variants" />
        </x-on-this-page>
    @endslot
</div>
