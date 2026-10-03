<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Input components - Tallcraftui')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Input Components - Form Elements for Laravel & TailwindCSS | Tallcraftui" 
            description="Build powerful, accessible form inputs with advanced features and validation. Designed for Laravel applications using TailwindCSS, offering seamless integration and customization options." 
            keywords="Laravel form inputs, TailwindCSS form elements, web forms, Laravel UI components, form validation, input fields, form design" 
        />
    @endslot

    @slot('content')
        <x-heading title="Input" subtitle="Form Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-input />
                <x-input placeholder="Your name" />
                <x-input label="Name" placeholder="Your name" />
                <x-input label="Name" placeholder="Your name" hint="Enter your full name" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Required field">
            @verbatim('docs')
                <x-input label="Name *" placeholder="Your name" />
                {{-- OR --}}
                <x-input label="Name" placeholder="Your name" required />
            @endverbatim
        </x-code-block>

        <x-code-block title="Icon">
            @verbatim('docs')
                <x-input label="Name" icon="user" placeholder="Your name" />
                <x-input label="Name" icon-right="user" placeholder="Your name" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Prefix Suffix">
            @verbatim('docs')
                <x-input label="Website" prefix="https://" placeholder="example.com" />
                <x-input label="Email" suffix="@gmail.com" placeholder="example@gmail.com" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Prepend Append">
            @verbatim('docs')
                @php
                    $users = App\Models\User::pluck('name', 'id');
                    $countries = collect([
                        ['id' => 1, 'name' => 'BD'],
                        ['id' => 2, 'name' => 'In'],
                        ['id' => 3, 'name' => 'USA'],
                        ['id' => 4, 'name' => 'UK'],
                        ['id' => 5, 'name' => 'Russia'],
                    ])->pluck('name', 'id');
                @endphp

                <x-input label="User">
                    @slot('prepend')
                        <x-select :options="$users" placeholder="User" />
                    @endslot
                </x-input>

                <x-input label="Countries">
                    @slot('append')
                        <x-select :options="$countries" placeholder="Country" />
                    @endslot
                </x-input>
            @endverbatim
        </x-code-block>

        <x-code-block title="Inline">
            @verbatim('docs')
                <x-input placeholder="Your name" inline />
                <x-input label="Name" placeholder="Your name" inline />
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants">
            @verbatim('docs')
                <x-input placeholder="xs" xs />
                <x-input placeholder="sm" sm />
                <x-input placeholder="md" md />
                <x-input placeholder="lg" lg />
                <x-input placeholder="xl" xl />
            @endverbatim
        </x-code-block>

        <x-code-block title="Rounded corner">
            @verbatim('docs')
                <x-input placeholder="default" />
                <x-input placeholder="rounded-none" rounded-none />
                <x-input placeholder="rounded-sm" rounded-sm />
                <x-input placeholder="rounded-md" rounded-md />
                <x-input placeholder="rounded-lg" rounded-lg />
                <x-input placeholder="rounded-xl" rounded-xl />
                <x-input placeholder="rounded-2xl" rounded-2xl />
                <x-input placeholder="rounded-3xl" rounded-3xl />
                <x-input placeholder="rounded-full" rounded-full />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize input">
            @slot('description')
                Apply standard <code>css</code> classes to style <strong>input</strong> fields and use the <code>class:icon</code> attribute for <strong>icon</strong> customization.
            @endslot

            @verbatim('docs')
                <x-input label="Name" icon="user" placeholder="Name" class="py-2 text-xs border-primary/60 focus:border-primary" class:icon="size-3.5" />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Required field" />
            <x-on-this-page.item title="Icon" />
            <x-on-this-page.item title="Prefix suffix" />
            <x-on-this-page.item title="Prepend append" />
            <x-on-this-page.item title="Inline" />
            <x-on-this-page.item title="Size variants" new />
            <x-on-this-page.item title="Rounded corner" />
            <x-on-this-page.item title="Customize input" />
        </x-on-this-page>
    @endslot
</div>
