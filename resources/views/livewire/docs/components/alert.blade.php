<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Alert components - Tallcraftui')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Alert Components for Laravel & TailwindCSS - TallCraftUI"
            description="Create dynamic and accessible alert components with TallCraftUI. Features multiple styles, colors, dismissible options, and customizable designs for effective user notifications." 
        />
    @endslot

    @slot('content')
        <x-heading title="Alert" subtitle="UI Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-alert title="Primary" dismissible />
                <x-alert title="Blue" dismissible blue />
                <x-alert title="Amber" dismissible amber />
                <x-alert title="Red" dismissible red />
                <x-alert title="Green" dismissible success />
            @endverbatim
        </x-code-block>

        <x-code-block title="Alert description">
            @verbatim('docs')
                <x-alert description="Lorem, ipsum dolor sit amet consectetur adipisicing." red />
            @endverbatim
        </x-code-block>

        <x-code-block title="Alert dismissible">
            @verbatim('docs')
                <x-alert red dismissible />
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom icon">
            @verbatim('docs')
                <x-alert icon="rocket-launch" title="New version has been released." blue dismissible />
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom slots">
            @verbatim('docs')
                <x-alert icon="question-mark-circle" red>
                    <x-slot name="title">
                        A new software update is available. See what's new in <strong class="underline cursor-pointer">version
                            3.0.7</strong>
                    </x-slot>

                    <x-slot name="description">
                        Description! Lorem, ipsum dolor sit amet consectetur adipisicing Lorem, ipsum..
                    </x-slot>

                    <x-slot name="actions">
                        <x-button @click="visible = false" label="Close" flat sm red />
                    </x-slot>
                </x-alert>
            @endverbatim
        </x-code-block>

        <x-code-block title="Color variants">
            @verbatim('docs')
                <x-alert title="Primary" />
                <x-alert title="Secondary" secondary />
                <x-alert title="Black" black />
                <x-alert title="White" white />
                <x-alert title="Slate" slate />
                <x-alert title="Zinc" zinc />
                <x-alert title="Gray" gray />
                <x-alert title="Neutral" neutral />
                <x-alert title="Stone" stone />
                <x-alert title="Red" red />
                <x-alert title="Orange" orange />
                <x-alert title="Amber" amber />
                <x-alert title="Yellow" yellow />
                <x-alert title="Lime" lime />
                <x-alert title="Green" green />
                <x-alert title="Emerald" emerald />
                <x-alert title="Teal" teal />
                <x-alert title="Cyan" cyan />
                <x-alert title="Sky" sky />
                <x-alert title="Blue" blue />
                <x-alert title="Indigo" Indigo />
                <x-alert title="Violet" violet />
                <x-alert title="Purple" purple />
                <x-alert title="Fuchsia" fuchsia />
                <x-alert title="Pink" pink />
                <x-alert title="Rose" rose />
            @endverbatim
        </x-code-block>

        <x-code-block title="Rounded corner">
            @verbatim('docs')
                <x-alert title="Rounded none" rounded-none />
                <x-alert title="Rounded sm" rounded-sm />
                <x-alert title="Rounded Default" />
                <x-alert title="Rounded md" rounded-md />
                <x-alert title="Rounded lg" rounded-lg />
                <x-alert title="Rounded xl" rounded-xl />
                <x-alert title="Rounded 2xl" rounded-2xl />
                <x-alert title="Rounded 3xl" rounded-3xl />
                <x-alert title="Rounded full" rounded-full />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Alert description" />
            <x-on-this-page.item title="Alert dismissible" />
            <x-on-this-page.item title="Custom slots" />
            <x-on-this-page.item title="Color variants" />
            <x-on-this-page.item title="Rounded corner" />
        </x-on-this-page>
    @endslot
</div>
