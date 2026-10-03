<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Breadcrumb - TallCraftUI Components')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Breadcrumb Navigation Components for Laravel & TailwindCSS - TallCraftUI"
            description="Implement intuitive navigation breadcrumbs with TallCraftUI. Create clear navigation paths with customizable icons and styles." />
    @endslot

    @slot('content')
        <x-heading title="Breadcrumb" subtitle="UI Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-breadcrumb>
                    <x-breadcrumb-item label="Home" :href="route('home')" icon-none />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" />
                    <x-breadcrumb-item label="icon" />
                </x-breadcrumb>

                <x-breadcrumb>
                    <x-breadcrumb-item label="Home" :href="route('home')" icon="home" />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" />
                    <x-breadcrumb-item label="icon" />
                </x-breadcrumb>
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom icon">
            @verbatim('docs')
                <x-breadcrumb>
                    <x-breadcrumb-item label="Icon" icon-none />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" icon="chevron-left" />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" icon="chevron-left" />
                    <x-breadcrumb-item label="Home" :href="route('home')" icon="chevron-left" />
                </x-breadcrumb>

                <x-breadcrumb>
                    <x-breadcrumb-item label="Icon" icon-none />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" icon="chevron-left" />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" icon="chevron-left" />
                    <x-breadcrumb-item label="Home" :href="route('home')" icon="chevron-left" icon-right="home" />
                </x-breadcrumb>

                <x-breadcrumb>
                    <x-breadcrumb-item label="Home" :href="route('home')" icon-none />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" icon="slash" />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" icon="slash" />
                    <x-breadcrumb-item label="icon" icon="slash" />
                </x-breadcrumb>
    
                <x-breadcrumb>
                    <x-breadcrumb-item label="Home" :href="route('home')" icon="home" />
                    <x-breadcrumb-item label="Button" :href="route('docs.components.button')" icon="slash" />
                    <x-breadcrumb-item label="Input" :href="route('docs.components.input')" icon="slash" />
                    <x-breadcrumb-item label="icon" icon="slash" />
                </x-breadcrumb>
            @endverbatim
        </x-code-block>
    @endslot

</div>
