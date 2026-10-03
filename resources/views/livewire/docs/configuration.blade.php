<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Configurations - Tallcraftui')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Configurations - Tallcraftui" description="Tallcraftui Configurations" />
    @endslot

    @slot('content')
        <x-heading title="Configurations" subtitle="TallCraftUI" description="Customize the default behavior and appearance of the component by editing the configuration file." />
            
        <x-code-block title="Publish the configuration file" language="bash" no-render>
            @slot('description')
                <p>Run the following command to publish the <code>tallcraftui.php</code> configuration file:</p>
            @endslot
            
            @verbatim('docs')
                php artisan vendor:publish --tag=tallcraftui-config
            @endverbatim
        </x-code-block>
            
        <div class="overflow-y-auto max-h-[560px]">
            <x-code language="php">
                @verbatim
                return [
                    
                    /**
                    * --------------------------------------------------------------------------
                    * Default Component Prefix
                    * --------------------------------------------------------------------------
                    *
                    * The prefix applied to all components. After changing this value, be sure
                    * to clear the view cache using `php artisan view:clear`.
                    *
                    * Examples:
                    *
                    * 'prefix' => ''       // <x-input />
                    * 'prefix' => 'tc-'    // <x-tc-input />
                    * 
                    */
                    'prefix' => env('TALLCRAFTUI_PREFIX', ''),
                
                    /**
                    * --------------------------------------------------------------------------
                    * Icon Configuration
                    * --------------------------------------------------------------------------
                    *
                    * The default icon settings for the components. You can specify the type
                    * and style of icons that should be used.
                    *
                    * type => Allowed: heroicons
                    * style => Allowed: outline, solid
                    * 
                    */
                    'icons' => [
                        'type' => 'heroicons',
                        'style' => 'outline',
                    ],
                
                    /**
                    * --------------------------------------------------------------------------
                    * UI Components
                    * --------------------------------------------------------------------------
                    *
                    * Configure the appearance and behavior of ui components.
                    */
                    'alert' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'badge' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'breadcrumb' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'button' => [
                        'size' => Size::MD->value,
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'dropdown' => [
                        'width' => Width::W48->value,
                        'shadow' => Shadow::Shadow->value,
                        'position' => Position::TOP->value,
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'modal' => [
                        'size' => Size::LG->value,
                        'blur' => false, // Allowed: true, false
                        'position' => Position::TOP->value,
                        'border-radius' => BorderRadius::RoundedLg->value,
                    ],
                
                    'stat' => [
                        'border-radius' => BorderRadius::RoundedLg->value,
                    ],
                
                    'menu' => [
                        'width' => Width::W56->value,
                        'shadow' => Shadow::Shadow->value,
                        'border-radius' => BorderRadius::RoundedMd->value,
                    ],
                
                    /**
                    * --------------------------------------------------------------------------
                    * Form Components
                    * --------------------------------------------------------------------------
                    *
                    * Configure the appearance and behavior of form components.
                    */
                    'checkbox' => [
                        'size' => Size::MD->value,
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'input' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'radio' => [
                        'size' => Size::MD->value,
                    ],
                
                    'select' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'textarea' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                
                    'toggle' => [
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                ];
                @endverbatim
            </x-code>
        </div>

        <x-code-block title="Clear view cache" language="bash" no-render>
            @slot('description')
                After modifying the configuration file, clear the view cache using the following command:
            @endslot

            @verbatim('docs')
                php artisan view:clear
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Publish the configuration file" />
            <x-on-this-page.item title="Clear view cache" />
        </x-on-this-page>
    @endslot
</div>
