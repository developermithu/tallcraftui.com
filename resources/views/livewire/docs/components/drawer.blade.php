<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Component;
use App\Models\User;

new #[Layout('components.layouts.app')] #[Title('Drawer - TallCraftUI Components')] class extends Component {
    public bool $showDrawer = false;
    public bool $openWithLivewire = false;
    public bool $openWithAlpine = false;
    
    // Position
    public bool $openLeft = false;
    public bool $openRight = false;
    public bool $openTop = false;
    public bool $openBottom = false;
    
    // Persistent
    public bool $openPersistent = false;
    
    // Blur background
    public bool $openBlur = false;

    public string $name;
    public string $email;
    public string $password; 

    public function createUser()
    {
        $this->validate([
            'name' => ['required', 'string'], 
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $this->pull('name'),
            'email' => $this->pull('email'),
            'password' => $this->pull('password'),
        ]);

        $this->dispatch('close');
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Drawer Components for Laravel & TailwindCSS - TallCraftUI"
            description="Create smooth sliding panels and off-canvas menus with TallCraftUI's drawer component. Features customizable positions, transitions, and backdrop effects." />
    @endslot

    <x-heading title="Drawer" subtitle="Dialog Components">
        @slot('description')
        You can trigger the drawer to close from any PHP class by dispatching a close event <code>$this->dispatch('close');</code>.
        @endslot
    </x-heading>

    <x-code-block title="Basic usage" inline>
        @verbatim('docs')
                @php 
                    /* 
                    public string $name;
                    public string $email;
                    public string $password; 

                    public function createUser()
                    {
                        $this->validate([
                            'name' => ['required', 'string'], 
                            'email' => ['required', 'email', 'unique:users,email'], 
                            'password' => ['required', 'string', 'min:8'],
                        ]);

                        User::create([
                            'name' => $this->pull('name'),
                            'email' => $this->pull('email'),
                            'password' => $this->pull('password'),
                        ]);

                        // Close the drawer
                        $this->dispatch('close');
                    } */
                @endphp 
            
            <x-button x-on:click="$wire.showDrawer = true" label="Form" />

            <x-drawer wire:model="showDrawer" title="Create new user" blur>
                <form wire:submit="createUser" class="space-y-4">
                    <x-input wire:model="name" label="Name *" />
                    <x-input wire:model="email" label="Email *" />
                    <x-input type="password" wire:model="password" label="Password *" />
        
                    <div class="flex justify-end w-full gap-5">
                        <x-button label="Submit" spinner="createUser" class="w-full py-2.5"/>
                    </div>
                </form>
            </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Open with Livewire">
        @slot('description')
            It will send network request.
        @endslot
        
        @verbatim('docs')           
            <x-button wire:click="$set('openWithLivewire', true)" label="Livewire" />

                <x-drawer wire:model="openWithLivewire" title="Open with Livewire">
                    Drawer content..
                </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Open with Alpine Js">
        @slot('description')
            It will not send any network request.
        @endslot

        @verbatim('docs')           
            <x-button x-on:click="$wire.openWithAlpine = true" label="Alpine" />

                <x-drawer wire:model="openWithAlpine" title="Open with Alpine Js">
                    Drawer content..
                </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Position" inline>
        @verbatim('docs')
                <x-button x-on:click="$wire.openLeft = true" label="Left" />
                <x-button x-on:click="$wire.openRight = true" label="Right" /> {{-- default --}}
                <x-button x-on:click="$wire.openTop = true" label="Top" /> 
                <x-button x-on:click="$wire.openBottom = true" label="Bottom" />

                <x-drawer wire:model="openTop" title="Position top" top>
                    Drawer content..
                </x-drawer>

                <x-drawer wire:model="openBottom" title="Position bottom" bottom>
                    Drawer content..
                </x-drawer>

                <x-drawer wire:model="openLeft" title="Position left" left>
                    Drawer content..
                </x-drawer>

                {{-- default --}}
                <x-drawer wire:model="openRight" title="Position right" right>
                    Drawer content..
                </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Persistent">
        @verbatim('docs')
            <x-button x-on:click="$wire.openPersistent = true" label="Persistent" />

                <x-drawer wire:model="openPersistent" title="Persistent" persistent>
                    Drawer content..
                </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Background blur" inline>
        @verbatim('docs')
                <x-button x-on:click="$wire.openBlur = true" label="Blur" />
                
                <x-drawer wire:model="openBlur" title="Background blur-sm" blur>
                    Drawer content..
                </x-drawer>
        @endverbatim
    </x-code-block>

    <x-code-block title="Size variants" no-render>
        @verbatim('docs')
                <x-drawer sm>
                <x-drawer md>
                <x-drawer lg>
                <x-drawer xl>
                <x-drawer 2xl>
                <x-drawer 3xl>
                <x-drawer 4xl>
                <x-drawer 5xl>
                <x-drawer 6xl>
                <x-drawer 7xl>
                <x-drawer full>
        @endverbatim
    </x-code-block>

    <x-code-block title="Disable focus trap" no-render>
        @slot('description')
            The <code>focus trap</code> is enabled by default, but you can disable it by including the <code>without-trap-focus</code> attribute.
        @endslot
        
        @verbatim('docs')
            <x-drawer without-trap-focus />
        @endverbatim
    </x-code-block>

    <h2 id="default-settings">Default settings</h2>

    <p>Change drawer default settings according your needs <code>config/tallcraftui.php</code> </p>
        
    <x-code language="php">
        @verbatim
                return [                
                    'drawer' => [
                        'width' => 'lg', // Allowed: sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, full
                        'blur' => false,
                        'trap-focus' => true,
                    ],
                ];
        @endverbatim
    </x-code>
 
</div>
