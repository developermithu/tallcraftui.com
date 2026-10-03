<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Tab components - Tallcraftui')] class extends Component {
    public string $activeTab = 'tab1';
    public string $activeTab2 = 'account';
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Interactive Tab Components for Laravel & TailwindCSS | TallCraftUI" 
            description="Create dynamic and accessible tab interfaces with smooth transitions and Alpine.js integration." 
            keywords="Laravel tabs, TailwindCSS tabs, Alpine.js tabs, content organization, tab navigation, Laravel UI components, interactive tabs"
        />
    @endslot

    <x-heading title="Tab" subtitle="UI Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                @php
                    // public string $activeTab = 'tab1';
                @endphp

                <x-tab wire:model="activeTab" class="max-w-md">
                    <x-slot name="items">
                        <x-tab-item id="tab1" label="Tab 1" />
                        <x-tab-item id="tab2" label="Tab 2" />
                        <x-tab-item id="tab3" label="Tab 3" />
                    </x-slot>

                    <x-tab-content id="tab1"> Tab 1 </x-tab-content>
                    <x-tab-content id="tab2"> Tab 2 </x-tab-content>
                    <x-tab-content id="tab3"> Tab 3 </x-tab-content>
                </x-tab>
        @endverbatim
    </x-code-block>

    <x-code-block title="Switch tab">
        @verbatim('docs')
                @php
                    // public string $activeTab2 = 'account';
                @endphp

                <x-tab wire:model="activeTab2" class="max-w-md" as="switch">
                    <x-slot name="items">
                        <x-tab-item id="account" label="Account" icon="user" as="switch" />
                        <x-tab-item id="password" label="Password" icon="key" as="switch" />
                    </x-slot>
                    
                    <x-tab-content id="account">
                        <x-card class="rounded-sm">
                            <x-card-header title="Account" subtitle="Create an account and manage your profile." />
                            
                            <x-card-content>
                                <x-input label="Name" />
                                <x-input label="Email" />
                            </x-card-content>
                            
                            <x-card-footer>
                                <x-button label="Save" />
                            </x-card-footer>
                        </x-card>
                    </x-tab-content>
                    
                    <x-tab-content id="password">
                        <x-card class="rounded-sm">
                            <x-card-header title="Password" subtitle="Change your password for security purposes." />
                            
                            <x-card-content>
                                <x-input label="Current Password" />
                                <x-input label="New Password" />
                            </x-card-content>
                            
                            <x-card-footer>
                                <x-button label="Save password" />
                            </x-card-footer>
                        </x-card>
                    </x-tab-content>
                </x-tab>
        @endverbatim
    </x-code-block>

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Switch tab" />
        </x-on-this-page>
    @endslot
</div>
