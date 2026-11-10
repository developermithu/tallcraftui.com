<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Avatar - TallCraftUI Components')] 
class extends Component {
    public string $imageUrl = '/assets/img/avatar.jpg';
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Avatar Components for Laravel & TailwindCSS - TallCraftUI"
            description="Create professional user avatars with TallCraftUI. Features image support, text fallbacks, badges, rings, and multiple size variants for enhanced user interfaces." 
        />
    @endslot

    @slot('content')
        <x-heading title="Avatar" subtitle="UI Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-avatar />
                <x-avatar text="tall craftui" />
                <x-avatar :image="$this->imageUrl" />
                <x-avatar :image="$this->imageUrl" badge />
                <x-avatar :image="$this->imageUrl" ring />
                <x-avatar :image="$this->imageUrl" ring badge />
                <x-avatar :image="$this->imageUrl" rounded-sm ring-3 badge badge-position="bottom" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Default avatar" inline>
            @verbatim('docs')
                <x-avatar />
                <x-avatar badge />
                <x-avatar ring />
                <x-avatar ring badge />
                <x-avatar ring badge badge-position="bottom" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Avatar with text" inline>
            @verbatim('docs')
                <x-avatar text="tallcraftui" />
                <x-avatar text="tallcraftui" badge />
                <x-avatar text="tallcraftui" ring />
                <x-avatar text="tallcraftui" ring badge />
                <x-avatar text="tallcraftui" ring-3 badge badge-position="bottom"/>
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants" inline>
            @verbatim('docs')
                <x-avatar :image="$this->imageUrl" alt="Avatar" sm />
                <x-avatar :image="$this->imageUrl" alt="Avatar" md />
                <x-avatar :image="$this->imageUrl" alt="Avatar" lg />
                <x-avatar :image="$this->imageUrl" alt="Avatar" xl />
            @endverbatim
        </x-code-block>

        <x-code-block title="Stacked" inline>
            @verbatim('docs')
                <x-avatars stacked>
                    <x-avatar />
                    <x-avatar />
                    <x-avatar />
                    <x-avatar />
                    <x-avatar />
                </x-avatars>

                <x-avatars stacked>
                    <x-avatar text="tallcraftui" ring />
                    <x-avatar text="tallcraftui" ring />
                    <x-avatar text="tallcraftui" ring />
                    <x-avatar text="tallcraftui" ring />
                    <x-avatar text="tallcraftui" ring />
                </x-avatars>

                <x-avatars stacked plus="99" ring>
                    <x-avatar :image="$this->imageUrl" ring />
                    <x-avatar :image="$this->imageUrl" ring />
                    <x-avatar :image="$this->imageUrl" ring />
                    <x-avatar :image="$this->imageUrl" ring />
                    <x-avatar :image="$this->imageUrl" ring />
                </x-avatars>
            @endverbatim
        </x-code-block>

        <x-code-block title="Avatar with ring-3" inline>
            @verbatim('docs')
                <x-avatar :image="$this->imageUrl" ring />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="black" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="white" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="slate" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="gray" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="zinc" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="neutral" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="stone" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="red" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="orange" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="amber" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="yellow" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="lime" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="green" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="cyan" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="sky" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="purple" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="fuchsia" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="pink" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="rose" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Avatar with badge" inline>
            @verbatim('docs')
                <x-avatar :image="$this->imageUrl" badge />
                <x-avatar :image="$this->imageUrl" badge badge-color="black" />
                <x-avatar :image="$this->imageUrl" badge badge-color="white" />
                <x-avatar :image="$this->imageUrl" badge badge-color="slate" />
                <x-avatar :image="$this->imageUrl" badge badge-color="gray" />
                <x-avatar :image="$this->imageUrl" badge badge-color="zinc" />
                <x-avatar :image="$this->imageUrl" badge badge-color="neutral" />
                <x-avatar :image="$this->imageUrl" badge badge-color="stone" />
                <x-avatar :image="$this->imageUrl" badge badge-color="red" />
                <x-avatar :image="$this->imageUrl" badge badge-color="orange" />
                <x-avatar :image="$this->imageUrl" badge badge-color="amber" />
                <x-avatar :image="$this->imageUrl" badge badge-color="yellow" />
                <x-avatar :image="$this->imageUrl" badge badge-color="lime" />
                <x-avatar :image="$this->imageUrl" badge badge-color="green" />
                <x-avatar :image="$this->imageUrl" badge badge-color="cyan" />
                <x-avatar :image="$this->imageUrl" badge badge-color="sky" />
                <x-avatar :image="$this->imageUrl" badge badge-color="purple" />
                <x-avatar :image="$this->imageUrl" badge badge-color="fuchsia" />
                <x-avatar :image="$this->imageUrl" badge badge-color="pink" />
                <x-avatar :image="$this->imageUrl" badge badge-color="rose" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Badge with Ring" inline>
            @verbatim('docs')
                <x-avatar :image="$this->imageUrl" ring badge />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="black" badge badge-color="black" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="white" badge badge-color="white" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="slate" badge badge-color="slate" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="gray" badge badge-color="gray" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="zinc" badge badge-color="zinc" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="neutral" badge badge-color="neutral" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="stone" badge badge-color="stone" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="red" badge badge-color="red" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="orange" badge badge-color="orange" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="amber" badge badge-color="amber" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="yellow" badge badge-color="yellow" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="lime" badge badge-color="lime" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="green" badge badge-color="green" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="cyan" badge badge-color="cyan" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="sky" badge badge-color="sky" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="purple" badge badge-color="purple" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="fuchsia" badge badge-color="fuchsia" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="pink" badge badge-color="pink" />
                <x-avatar :image="$this->imageUrl" ring-3 ring-color="rose" badge badge-color="rose" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Rounded corner" inline>
            @verbatim('docs')
                <x-avatar :image="$this->imageUrl" rounded-none />
                <x-avatar :image="$this->imageUrl" rounded-sm />
                <x-avatar :image="$this->imageUrl" rounded />
                <x-avatar :image="$this->imageUrl" rounded-md />
                <x-avatar :image="$this->imageUrl" rounded-lg />
                <x-avatar :image="$this->imageUrl" rounded-xl />
                <x-avatar :image="$this->imageUrl" rounded-2xl />
                <x-avatar :image="$this->imageUrl" rounded-3xl />
                <x-avatar :image="$this->imageUrl" rounded-full />
            @endverbatim
        </x-code-block>
    @endslot

</div>
