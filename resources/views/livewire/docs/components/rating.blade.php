<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Validate};

new #[Layout('components.layouts.app')] #[Title('Rating components - Tallcraftui')] class extends Component {
    public int $rating = 3;
    public int $rating2 = 3;
    public int $rating3 = 3;
    public int $rating4 = 3;
    public int $rating5 = 3;
    public int $rating6 = 3;
    public int $rating7 = 3;
    public int $rating8 = 3;
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Star Rating Component for Laravel & Tailwind CSS - TallCraftUI"
            description="Implement beautiful, interactive star rating systems with TallCraftUI. Perfect for product reviews, user feedback, and rating interfaces in your Laravel applications."
            description="Explore the versatile and customizable rating component from TallCraftUI." />
    @endslot

    <x-heading title="Rating" subtitle="UI Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                @php
                    // public int $rating = 3;
                @endphp

                <x-rating wire:model="rating" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Custom icon">
        @verbatim('docs')
            <x-rating wire:model="rating2" icon="heart" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Total icons">
        @verbatim('docs')
            <x-rating wire:model="rating3" total="3" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Size variants">
        @verbatim('docs')
                <x-rating wire:model="rating4" sm />
                <x-rating wire:model="rating5" md />
                <x-rating wire:model="rating6" lg />
                <x-rating wire:model="rating7" xl />
                <x-rating wire:model="rating8" 2xl />
        @endverbatim
    </x-code-block>

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Size variants" />
            <x-on-this-page.item title="Custom icon" />
            <x-on-this-page.item title="Total icons" />
        </x-on-this-page>
    @endslot
</div>
