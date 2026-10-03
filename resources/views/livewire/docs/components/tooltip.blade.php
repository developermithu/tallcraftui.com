<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Tooltip - TallCraftUI Components')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Customizable Tooltip Components for Laravel - TallCraftUI" 
            description="Explore customizable Tooltip components in TallCraftUI for Laravel, featuring dynamic configurations like arrow position, transitions, and gradient backgrounds. Enhance your UI with smooth, responsive tooltips."
            keywords="Laravel tooltip components, customizable tooltip Laravel, TallCraftUI tooltip, dynamic tooltips Laravel, tailwindcss tooltip" 
        />
    @endslot

    @slot('content')
        <x-heading title="Tooltip" subtitle="Form Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-tooltip text="Default" />

                {{-- Custom icon --}}
                <x-tooltip text="Custom icon" icon="information-circle" />

                {{-- custom slot --}}
                <x-tooltip text="Custom slot">
                    <x-icon name="cog-6-tooth" class="text-gray-500" />
                </x-tooltip>
            @endverbatim
        </x-code-block>

        <x-code-block title="Tooltip position" inline>
            @verbatim('docs')
                <x-tooltip text="Top" top />
                <x-tooltip text="Bottom" bottom />
                <x-tooltip text="Left" left />
                <x-tooltip text="Right" right />
            @endverbatim
        </x-code-block>

        <x-code-block title="Gradient tooltip" inline>
            @verbatim('docs')
                <x-tooltip text="TallCraftUI" gradient />
            @endverbatim
        </x-code-block>

        <x-code-block title="Without transition" inline>
            @verbatim('docs')
                <x-tooltip text="TallCraftUI" no-transition />
            @endverbatim
        </x-code-block>

        <x-code-block title="Without arrow" inline>
            @verbatim('docs')
                <x-tooltip text="TallCraftUI" no-arrow />
            @endverbatim
        </x-code-block>

        <h2 id="default-settings">Default settings</h2>

        <p>Change <strong>tooltip</strong> default settings according your needs <code>config/tallcraftui.php</code> </p>
            
        <x-code language="php">
            @verbatim
                return [                
                    'tooltip' => [
                        'position' => Position::TOP->value,
                        'gradient' => false,
                        'noArrow' => false,
                        'noTransition' => false,
                    ],
                ];
            @endverbatim
        </x-code>
    @endslot

</div>
