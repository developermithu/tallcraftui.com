<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Dropdown - TallCraftUI Components')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Dropdown Components - Interactive UI Elements for Laravel & TailwindCSS | Tallcraftui" 
            description="Implement customizable dropdown menus with various positions, animations, and styling options." 
            keywords="Laravel dropdown, TailwindCSS dropdown menu, interactive UI components, web development, Laravel UI library, responsive dropdowns, customizable menus" 
        />
    @endslot

    @slot('content')
        <x-heading title="Dropdown" subtitle="UI Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-dropdown>
                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                <x-dropdown title="Account settings">
                    @slot('trigger')
                        <x-button label="Menu" outline />
                    @endslot

                    <x-dropdown-item label="Profile" icon="user" />
                    <x-dropdown-item label="Update password" icon="key" />
                    <x-dropdown-item label="Settings" icon="cog-6-tooth" />

                    <x-separator />
                    
                    <x-dropdown-item label="Sign out" icon="arrow-right-end-on-rectangle" />
                </x-dropdown>
            @endverbatim
        </x-code-block>

        <x-code-block title="Dropdown position" inline>
            @verbatim('docs')
                <x-dropdown top>
                    @slot('trigger')
                        <x-button label="Top" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                <x-dropdown top-start>
                    @slot('trigger')
                        <x-button label="Top start" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown top-end>
                    @slot('trigger')
                        <x-button label="Top end" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                <x-dropdown bottom>
                    @slot('trigger')
                        <x-button label="Bottom" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                <x-dropdown bottom-start>
                    @slot('trigger')
                        <x-button label="Bottom start" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                {{-- Default --}}
                <x-dropdown bottom-end>
                    @slot('trigger')
                        <x-button label="Bottom end" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown left>
                    @slot('trigger')
                        <x-button label="Left" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown left-start>
                    @slot('trigger')
                        <x-button label="Left start" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown left-end>
                    @slot('trigger')
                        <x-button label="Left end" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown right>
                    @slot('trigger')
                        <x-button label="Right" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown right-start>
                    @slot('trigger')
                        <x-button label="Right start" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown right-end>
                    @slot('trigger')
                        <x-button label="Right end" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
            @endverbatim
        </x-code-block>

        <x-code-block title="Dropdown animation" inline new>
            @verbatim('docs')

                {{-- Default --}}
                <x-dropdown fade>
                    @slot('trigger')
                        <x-button label="Fade" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                <x-dropdown slide>
                    @slot('trigger')
                        <x-button label="Slide" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown flip>
                    @slot('trigger')
                        <x-button label="Flip" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown rotate>
                    @slot('trigger')
                        <x-button label="Rotate" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
            @endverbatim
        </x-code-block>
        
        <x-code-block title="Dropdown size" inline>
            @verbatim('docs')
                <x-dropdown w-36>
                    @slot('trigger')
                        <x-button label="w-36" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>

                {{-- Default --}}
                <x-dropdown w-48>
                    @slot('trigger')
                        <x-button label="w-48" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown w-64>
                    @slot('trigger')
                        <x-button label="w-64" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
                
                <x-dropdown w-80>
                    @slot('trigger')
                        <x-button label="w-80" outline />
                    @endslot

                    <div class="p-5">
                        Modal content.
                    </div>
                </x-dropdown>
            @endverbatim
        </x-code-block>

        <x-code-block title="Without transition">
            @verbatim('docs')
                <x-dropdown no-transition>
                    @slot('trigger')
                        <x-button icon="ellipsis-vertical" flat circle />
                    @endslot

                    <x-dropdown-item label="View" icon="eye" />
                    <x-dropdown-item label="Edit" icon="pencil-square" />
                    <x-dropdown-item label="Delete" icon="trash" />
                </x-dropdown>
            @endverbatim
        </x-code-block>

        <x-code-block title="Dropdown with link" inline>
            @verbatim('docs')
                <x-dropdown>
                    @slot('trigger')
                        <x-button icon="ellipsis-vertical" flat circle />
                    @endslot

                    <x-dropdown-item label="View" link="#" icon="eye" />
                    <x-dropdown-item label="Edit" link="#" icon="pencil-square" />
                    <x-dropdown-item label="Delete" link="#" icon="trash" />
                </x-dropdown>
            @endverbatim
        </x-code-block>

        <x-code-block title="Persistent">
            @verbatim('docs')
                <x-dropdown persistent>
                    @slot('trigger')
                        <x-button icon="ellipsis-vertical" flat circle />
                    @endslot

                    <x-dropdown-item label="View" icon="eye" />
                    <x-dropdown-item label="Edit" icon="pencil-square" />
                    <x-dropdown-item label="Delete" icon="trash" />
                </x-dropdown>
            @endverbatim
        </x-code-block>
        
        <h2 id="default-settings">Default settings</h2>

        <p>Change dropdown default settings according your needs <code>config/tallcraftui.php</code> </p>
            
        <x-code language="php">
            @verbatim
                return [                
                    'dropdown' => [
                        'width' => Width::W48->value,
                        'shadow' => Shadow::Shadow->value,
                        'position' => DropdownPosition::BOTTOM_END->value,
                        'animation' => DropdownAnimation::FADE->value,
                        'border-radius' => BorderRadius::Rounded->value,
                    ],
                ];
            @endverbatim
        </x-code>
    @endslot

</div>
