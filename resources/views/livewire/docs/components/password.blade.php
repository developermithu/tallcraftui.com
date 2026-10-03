<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Password components - Tallcraftui')] 
class extends Component {
    public ?string $password1 = '';
    public ?string $password2 = '';
    public ?string $password3 = '';
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Password components - Tallcraftui" description="Tailwind CSS ALpine js Password Components - Tallcraftui" />
    @endslot

    <x-heading title="Password" subtitle="Form Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                <x-password label="Password" wire:model="password1" />
                <x-password label="Hint" wire:model="password2" hint="Password must be at least 8 characters" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Password generator">
        @verbatim('docs')
            <x-password label="Password *" wire:model="password3" generate />
        @endverbatim
    </x-code-block>    

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Password generator" />
        </x-on-this-page>
    @endslot
</div>
