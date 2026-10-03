<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Color picker - TallCraftUI Components')] 
class extends Component {
    public ?string $color1 = '';
    public ?string $color2 = '';
    public ?string $color3 = '';
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Color Picker Components for Laravel & TailwindCSS - TallCraftUI"
            description="Implement intuitive color selection with TallCraftUI's color picker component. Features customizable color palettes, live preview, and seamless integration with Laravel applications." />
    @endslot

    <x-heading title="Color picker" subtitle="Form Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
            <x-color-picker label="Color picker" wire:model="color1" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Custom colors">
        @verbatim('docs')
            <x-color-picker wire:model="color2" :colors="['#eeeeee', '#dddddd', '#cccccc', '#bbbbbb', '#aaaaaa', '#000000']" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Without picker">
        @verbatim('docs')
            <x-color-picker wire:model="color3" no-picker />
        @endverbatim
    </x-code-block>

</div>
