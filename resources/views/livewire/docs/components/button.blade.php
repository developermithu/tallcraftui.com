<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Button - TallCraftUI Components')] class extends Component {
    public function delete()
    {
      return 'delete';
    }
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Button Components for Laravel & TailwindCSS - TallCraftUI" 
            description="Create stunning, customizable buttons with TallCraftUI. Features multiple styles, colors, sizes, and icon support." 
        />
    @endslot

    @slot('content')
        <x-heading title="Button" subtitle="UI Components">
            @slot('description')
                You can easily customize any <strong>button</strong> using standard <code>css</code> classes and <strong>icon</strong> using the <code>class:icon</code> attribute.
            @endslot
        </x-heading>

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-button label="Primary" />
                <x-button label="Secondary" secondary />
                <x-button label="Black" black />
                <x-button label="White" white />
                <x-button label="Slate" slate />
                <x-button label="Zinc" zinc />
                <x-button label="Gray" gray />
                <x-button label="Neutral" neutral />
                <x-button label="Stone" stone />
                <x-button label="Red" red />
                <x-button label="Orange" orange />
                <x-button label="Amber" amber />
                <x-button label="Yellow" yellow />
                <x-button label="Lime" lime />
                <x-button label="Green" green />
                <x-button label="Emerald" emerald />
                <x-button label="Teal" teal />
                <x-button label="Cyan" cyan />
                <x-button label="Sky" sky />
                <x-button label="Blue" blue />
                <x-button label="Indigo" indigo />
                <x-button label="Violet" violet />
                <x-button label="Purple" purple />
                <x-button label="Fuchsia" fuchsia />
                <x-button label="Pink" pink />
                <x-button label="Rose" rose />
            @endverbatim
        </x-code-block>

        <x-code-block title="Outline buttons" inline>
            @verbatim('docs')
                <x-button label="Primary" outline />
                <x-button label="Secondary" secondary outline />
                <x-button label="Black" black outline />
                <x-button label="White" white outline />
                <x-button label="Slate" slate outline />
                <x-button label="Zinc" zinc outline />
                <x-button label="Gray" gray outline />
                <x-button label="Neutral" neutral outline />
                <x-button label="Stone" stone outline />
                <x-button label="Red" red outline />
                <x-button label="Orange" orange outline />
                <x-button label="Amber" amber outline />
                <x-button label="Yellow" yellow outline />
                <x-button label="Lime" lime outline />
                <x-button label="Green" green outline />
                <x-button label="Emerald" emerald outline />
                <x-button label="Teal" teal outline />
                <x-button label="Cyan" cyan outline />
                <x-button label="Sky" sky outline />
                <x-button label="Blue" blue outline />
                <x-button label="Indigo" indigo outline />
                <x-button label="Violet" violet outline />
                <x-button label="Purple" purple outline />
                <x-button label="Fuchsia" fuchsia outline />
                <x-button label="Pink" pink outline />
                <x-button label="Rose" rose outline />
            @endverbatim
        </x-code-block>

        <x-code-block title="Flat buttons" inline>
            @verbatim('docs')
                <x-button label="Primary" flat />
                <x-button label="Secondary" secondary flat />
                <x-button label="Black" black flat />
                <x-button label="White" white flat />
                <x-button label="Slate" slate flat />
                <x-button label="Zinc" zinc flat />
                <x-button label="Gray" gray flat />
                <x-button label="Neutral" neutral flat />
                <x-button label="Stone" stone flat />
                <x-button label="Red" red flat />
                <x-button label="Orange" orange flat />
                <x-button label="Amber" amber flat />
                <x-button label="Yellow" yellow flat />
                <x-button label="Lime" lime flat />
                <x-button label="Green" green flat />
                <x-button label="Emerald" emerald flat />
                <x-button label="Teal" teal flat />
                <x-button label="Cyan" cyan flat />
                <x-button label="Sky" sky flat />
                <x-button label="Blue" blue flat />
                <x-button label="Indigo" indigo flat />
                <x-button label="Violet" violet flat />
                <x-button label="Purple" purple flat />
                <x-button label="Fuchsia" fuchsia flat />
                <x-button label="Pink" pink flat />
                <x-button label="Rose" rose flat />
            @endverbatim
        </x-code-block>

        <x-code-block title="Button as link" inline>
            @verbatim('docs')
                <x-button label="Link" :link="route('docs.components.button')" />
                <x-button label="Link" :link="route('docs.components.button')" no-wire-navigate />
                <x-button label="External link" link="https://laravel.com" external /> 
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants" inline>
            @verbatim('docs')
                <x-button label="Button" sm />
                <x-button label="Button" md /> {{-- default --}}
                <x-button label="Button" lg />
                <x-button label="Button" xl />
            @endverbatim
        </x-code-block>

        <x-code-block title="Rounded corner" inline>
            @verbatim('docs')
                <x-button label="Rounded none" rounded-none />
                <x-button label="Rounded sm" rounded-sm />
                <x-button label="Rounded Default" />
                <x-button label="Rounded md" rounded-md />
                <x-button label="Rounded lg" rounded-lg />
                <x-button label="Rounded xl" rounded-xl />
                <x-button label="Rounded 2xl" rounded-2xl />
                <x-button label="Rounded 3xl" rounded-3xl />
                <x-button label="Rounded full" rounded-full />
            @endverbatim
        </x-code-block>

        <x-code-block title="Button with icon" inline>
            @verbatim('docs')
                <x-button label="Home" icon="home" purple />
                <x-button label="Delete" icon="trash" red />
                <x-button label="View" icon="eye" gray />
                <x-button label="Edit" icon="pencil-square" amber />
                <x-button label="Save" icon="bookmark-square" green />

                <x-button label="Home" icon="home" purple outline />
                <x-button label="Delete" icon="trash" red outline />
                <x-button label="View" icon="eye" gray outline />
                <x-button label="Edit" icon="pencil-square" amber outline />
                <x-button label="Save" icon="bookmark-square" green outline />

                <x-button label="Home" icon="home" purple flat />
                <x-button label="Delete" icon="trash" red flat />
                <x-button label="View" icon="eye" gray flat />
                <x-button label="Edit" icon="pencil-square" amber flat />
                <x-button label="Save" icon="bookmark-square" green flat />
            @endverbatim
        </x-code-block>

        <x-code-block title="Circle buttons" inline>
            @verbatim('docs')
                <x-button icon="home" purple circle />
                <x-button icon="trash" red circle />
                <x-button icon="eye" gray circle />
                <x-button icon="pencil-square" amber circle />
                <x-button icon="bookmark-square" green circle />
                <x-button icon="archive-box-x-mark" rose circle />
                <x-button icon="bars-3" gray circle />
                <x-button icon="bell" blue circle />
                <x-button icon="chat-bubble-left-ellipsis" fuchsia circle />
            @endverbatim
        </x-code-block>

        <x-code-block title="Circle buttons - outline" inline>
            @verbatim('docs')
                <x-button icon="home" purple outline circle />
                <x-button icon="trash" red outline circle />
                <x-button icon="eye" gray outline circle />
                <x-button icon="pencil-square" amber outline circle />
                <x-button icon="bookmark-square" green outline circle />
                <x-button icon="archive-box-x-mark" rose outline circle />
                <x-button icon="bars-3" gray outline circle />
                <x-button icon="bell" blue outline circle />
                <x-button icon="chat-bubble-left-ellipsis" fuchsia outline circle />
            @endverbatim
        </x-code-block>

        <x-code-block title="Circle buttons - flat" inline>
            @verbatim('docs')
                <x-button icon="home" purple flat circle />
                <x-button icon="trash" red flat circle />
                <x-button icon="eye" gray flat circle />
                <x-button icon="pencil-square" amber flat circle />
                <x-button icon="bookmark-square" green flat circle />
                <x-button icon="archive-box-x-mark" rose flat circle />
                <x-button icon="bars-3" gray flat circle />
                <x-button icon="bell" blue flat circle />
                <x-button icon="chat-bubble-left-ellipsis" fuchsia flat circle />
            @endverbatim
        </x-code-block>

        <x-code-block title="With spinner" inline no-render>
            @slot('description')
                Add loading indicators to your buttons with the <code>spinner</code> attribute. For standalone buttons, simply add the <code>spinner</code> attribute to display a loading state during <strong>wire:click</strong> actions. In forms, you can specify which action triggers the spinner by passing the <strong>action name</strong> to the <code>spinner</code> attribute - this automatically shows the loading state during form submission.
            @endslot

            @verbatim('docs')
                <x-button wire:click="delete" label="Delete" spinner />

                <form wire:submit="create">
                    <x-button label="submit" spinner="create" />
                </form>
            @endverbatim
        </x-code-block>
    @endslot

</div>
