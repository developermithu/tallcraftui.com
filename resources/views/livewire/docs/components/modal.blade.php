<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Modal - TallCraftUI Components')] class extends Component {
    public bool $openDefault = false;
    public bool $openDeleteModal = false;
    public bool $openFormModal = false;
    public bool $openWithLivewire = false;
    public bool $openWithAlpine = false;
    
    // Position
    public bool $openTop = false;
    public bool $openBottom = false;
    public bool $openLeft = false;
    public bool $openRight = false;
    public bool $openCenter = false;
    
    // Persistent
    public bool $openPersistent = false;
    
    // Without transition
    public bool $openNoTransition = false;

    // Blur
    public bool $openBlurNone = false;
    public bool $openBlur = false;
    public bool $openBlurSm = false;
    public bool $openBlurMd = false;
    public bool $openBlurLg = false;
    public bool $openBlurXl = false;
    public bool $openBlur2Xl = false; 
    public bool $openBlur3Xl = false;
    
    // Size variants
    public bool $openSm = false;
    public bool $openMd = false;
    public bool $openLg = false;
    public bool $openXl = false;
    public bool $open2Xl = false; 
    public bool $open3Xl = false;
    public bool $open4Xl = false;
    public bool $open5Xl = false;
    public bool $open6Xl = false;
    public bool $open7Xl = false;
    public bool $openFull = false;

    // Rounded corner
    public bool $openRoundedNone = false;
    public bool $openRounded = false;
    public bool $openRoundedSm = false;
    public bool $openRoundedMd = false;
    public bool $openRoundedLg = false;
    public bool $openRoundedXl = false;
    
    public bool $openForm = false;

    public string $name;
    public string $email;
    public string $country;
    public string $details;

    public function createUser()
    {
        $user = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'country' => ['required'],
            'details' => ['sometimes'],
        ]);

        dd($user);
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Modal Components - Dynamic Dialog Windows for Laravel & TailwindCSS | Tallcraftui" 
            description="Create responsive and accessible modal dialogs with customizable animations, sizes, and behaviors." 
            keywords="Laravel modal, TailwindCSS dialog, popup windows, web components, Laravel UI components, responsive modals, accessible dialogs" 
        />
    @endslot

    <x-heading title="Modal" subtitle="Dialog Components">
        @slot('description')
        You can trigger the modal to close from any PHP class by dispatching a close event <code>$this->dispatch('close');</code>.
        @endslot
    </x-heading>

    <x-code-block title="Basic usage" inline>
        @verbatim('docs')
            <x-button x-on:click="$wire.openDefault = true" label="Default" />
            <x-button x-on:click="$wire.openDeleteModal = true" label="Delete Modal" />
            <x-button x-on:click="$wire.openFormModal = true" label="Form Modal" />

            {{-- Default modal --}}
            <x-modal wire:model="openDefault">
                Model content..
            </x-modal>

            {{-- Delete modal --}}
            <x-modal wire:model="openDeleteModal" md>
                <div class="p-6 text-center whitespace-normal">
                    <x-icon name="exclamation-circle" class="mx-auto mb-4 text-gray-400 size-12! dark:text-gray-200" />

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" style="text-transform: none">
                        {{ __('Are you sure you want to delete this?') }}
                    </h3>

                    <div class="flex items-center justify-center gap-3">
                        <x-button label="Close" x-on:click="$dispatch('close')" red flat />
                        <x-button label="Yes, delete" flat />
                    </div>
                </div>
            </x-modal>

            {{-- Form modal --}}
            <x-modal wire:model="openFormModal" dismissible xl>
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-3 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 capitalize dark:text-white">
                        {{ __('add new user') }}
                    </h3>
                </div>

                <!-- Modal body -->
                <form wire:submit="createUser" class="pt-5">
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div class="col-span-2 sm:col-span-1">
                            <x-input label="Name *" wire:model="name" />
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <x-input label="Email *" wire:model="email" />
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <x-select label="Select country *" wire:model="country">
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Nepal">Nepal</option>
                                <option value="India">India</option>
                                <option value="Bhutan">Bhutan</option>
                            </x-select>
                        </div>

                        <div class="col-span-2">
                            <x-textarea label="Details" wire:model="details" />
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <x-button label="Submit" spinner="createUser" />
                    </div>
                </form>
            </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Open with Livewire">
        @slot('description')
            It will send network request.
        @endslot
        
        @verbatim('docs')           
            <x-button wire:click="$set('openWithLivewire', true)" label="Livewire" />

                <x-modal wire:model="openWithLivewire">
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Open with Alpine Js">
        @slot('description')
            It will not send any network request.
        @endslot

        @verbatim('docs')           
            <x-button x-on:click="$wire.openWithAlpine = true" label="Alpine" />

                <x-modal wire:model="openWithAlpine">
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Position" inline>
        @verbatim('docs')
                <x-button x-on:click="$wire.openTop = true" label="Top" /> {{-- default --}}
                <x-button x-on:click="$wire.openBottom = true" label="Bottom" />
                <x-button x-on:click="$wire.openLeft = true" label="Left" />
                <x-button x-on:click="$wire.openRight = true" label="Right" />
                <x-button x-on:click="$wire.openCenter = true" label="Center" />

                {{-- default --}}
                <x-modal wire:model="openTop">
                    Model content..
                </x-modal>

                <x-modal wire:model="openBottom" bottom>
                    Model content..
                </x-modal>

                <x-modal wire:model="openLeft" left>
                    Model content..
                </x-modal>

                <x-modal wire:model="openRight" right>
                    Model content..
                </x-modal>

                <x-modal wire:model="openCenter" center>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Size variants" inline>
        @verbatim('docs')
                <x-button x-on:click="$wire.openSm = true" label="SM" />
                <x-button x-on:click="$wire.openMd = true" label="MD" />  
                <x-button x-on:click="$wire.openLg = true" label="LG" /> {{-- default --}}
                <x-button x-on:click="$wire.openXl = true" label="XL" />
                <x-button x-on:click="$wire.open2Xl = true" label="2XL" />
                <x-button x-on:click="$wire.open3Xl = true" label="3XL" />
                <x-button x-on:click="$wire.open4Xl = true" label="4XL" />
                <x-button x-on:click="$wire.open5Xl = true" label="5XL" />
                <x-button x-on:click="$wire.open6Xl = true" label="6XL" />
                <x-button x-on:click="$wire.open7Xl = true" label="7XL" />
                <x-button x-on:click="$wire.openFull = true" label="FULL" />

                <x-modal wire:model="openSm" sm>
                    Model content..
                </x-modal>

                <x-modal wire:model="openMd" md>
                    Model content..
                </x-modal>

                {{-- default --}}
                <x-modal wire:model="openLg" lg>
                    Model content..
                </x-modal>

                <x-modal wire:model="openXl" xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="open2Xl" 2xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="open3Xl" 3xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="open4Xl" 4xl>
                    Model content..
                </x-modal>
                
                <x-modal wire:model="open5Xl" 5xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="open6Xl" 6xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="open7Xl" 7xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="openFull" dismissible full>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Persistent">
        @verbatim('docs')
            <x-button x-on:click="$wire.openPersistent = true" label="Persistent" />

                <x-modal wire:model="openPersistent" dismissible persistent>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Without transition">
        @verbatim('docs')
            <x-button x-on:click="$wire.openNoTransition = true" label="Without transition" />

                <x-modal wire:model="openNoTransition" no-transition>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Background blur" inline>
        @verbatim('docs')
                <x-button x-on:click="$wire.openBlurNone = true" label="Blur none" /> {{-- default --}}
                <x-button x-on:click="$wire.openBlur = true" label="Blur" />
                <x-button x-on:click="$wire.openBlurSm = true" label="Blur SM" />
                <x-button x-on:click="$wire.openBlurMd = true" label="Blur MD" />  
                <x-button x-on:click="$wire.openBlurLg = true" label="Blur LG" />
                <x-button x-on:click="$wire.openBlurXl = true" label="Blur XL" />
                <x-button x-on:click="$wire.openBlur2Xl = true" label="Blur 2XL" />
                <x-button x-on:click="$wire.openBlur3Xl = true" label="Blur 3XL" />

                {{-- default --}}
                <x-modal wire:model="openBlurNone" blur-none>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlur" blur>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlurSm" blur-sm>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlurMd" blur-md>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlurLg" blur-lg>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlurXl" blur-xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlur2Xl" blur-2xl>
                    Model content..
                </x-modal>

                <x-modal wire:model="openBlur3Xl" blur-3xl>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Rounded corner" inline>  
        @slot('description')
        <ul class="flex flex-wrap items-center mt-2 gap-y-1 gap-x-2">
            <li>Allowed values:</li>
            <li class="text-xs"><code>rounded-none</code></li> 
            <li class="text-xs"><code>rounded</code></li> 
            <li class="text-xs"><code>rounded-sm</code></li> 
            <li class="text-xs"><code>rounded-md</code></li> 
            <li class="text-xs"><code>rounded-lg</code></li> 
            <li class="text-xs"><code>rounded-xl</code></li> 
            <li class="text-xs"><code>rounded-2xl</code></li> 
            <li class="text-xs"><code>rounded-3xl</code></li> 
            <li class="text-xs"><code>rounded-full</code></li>
        </ul>
        @endslot   
        
        @verbatim('docs')
                <x-button x-on:click="$wire.openRoundedNone = true" label="Rounded none" />
                <x-button x-on:click="$wire.openRounded = true" label="Rounded" />
                <x-button x-on:click="$wire.openRoundedSm = true" label="Rounded SM" />
                <x-button x-on:click="$wire.openRoundedMd = true" label="Rounded MD" />  
                <x-button x-on:click="$wire.openRoundedLg = true" label="Rounded LG" /> {{-- default --}}
                <x-button x-on:click="$wire.openRoundedXl = true" label="Rounded XL" />

                <x-modal wire:model="openRoundedNone" rounded-none>
                    Model content..
                </x-modal>

                <x-modal wire:model="openRounded" rounded>
                    Model content..
                </x-modal>

                <x-modal wire:model="openRoundedSm" rounded-sm>
                    Model content..
                </x-modal>

                <x-modal wire:model="openRoundedMd" rounded-md>
                    Model content..
                </x-modal>

                {{-- default --}}
                <x-modal wire:model="openRoundedLg" rounded-lg>
                    Model content..
                </x-modal>

                <x-modal wire:model="openRoundedXl" rounded-xl>
                    Model content..
                </x-modal>
        @endverbatim
    </x-code-block>

    <x-code-block title="Disable focus trap" no-render>
        @slot('description')
            The <code>focus trap</code> is enabled by default, but you can disable it by including the <code>without-trap-focus</code> attribute.
        @endslot
        
        @verbatim('docs')
            <x-modal without-trap-focus />
        @endverbatim
    </x-code-block>

    <h2 id="default-settings">Default settings</h2>

    <p>Change modal default settings according your needs <code>config/tallcraftui.php</code> </p>
        
    <x-code language="php">
        @verbatim
                return [                
                    'modal' => [
                        'size' => Size::LG->value,
                        'blur' => false, // Allowed: true, false
                        'position' => Position::TOP->value,
                        'border-radius' => BorderRadius::RoundedLg->value,
                    ],
                ];
        @endverbatim
    </x-code>

</div>
