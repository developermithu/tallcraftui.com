<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Accordion - TallCraftUI Components')] class extends Component {
    public string $activeItem = 'item-2';
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags
            title="Interactive Accordion Components for TailwindCSS & Alpine.js - TallCraftUI"
            description="Build dynamic, accessible accordion components with TallCraftUI. Perfect for FAQs, collapsible content, and interactive UI elements." />
    @endslot

    <x-heading title="Accordion" subtitle="UI Components" />

    <x-code-block title="Basic usage">
        @verbatim('docs')
                <x-accordion>
                    <x-accordion-item id="item1" title="Accordion Item 1">
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item2" title="Accordion Item 2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item3" title="Accordion Item 3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

    <x-code-block title="Active item">
        @verbatim('docs')
                @php
                    // public string $activeItem = 'item-2';
                @endphp

                <x-accordion wire:model="activeItem">
                    <x-accordion-item id="item-1" title="Accordion Item 1">
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item-2" title="Accordion Item 2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item-3" title="Accordion Item 3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

    <x-code-block title="With plus minus icon">
        @verbatim('docs')
                <x-accordion>
                    <x-accordion-item id="item1" title="Accordion Item 1" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item2" title="Accordion Item 2" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item3" title="Accordion Item 3" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

    <x-code-block title="Without border">
        @verbatim('docs')
                <x-accordion borderless>
                    <x-accordion-item id="item1" title="Accordion Item 1" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item2" title="Accordion Item 2" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item3" title="Accordion Item 3" icon-plus-minus>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

    <x-code-block title="With active border">
        @verbatim('docs')
                <x-accordion borderless>
                    <x-accordion-item id="item1" title="Accordion Item 1" icon-plus-minus active-border>
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item2" title="Accordion Item 2" icon-plus-minus active-border>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item3" title="Accordion Item 3" icon-plus-minus active-border>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

    <x-code-block title="Customize accordion">
        @slot('description')
            Use standard <code>css</code> classes to style the <strong>accordion</strong> component. Additionally, apply the <code>class:title</code> and <code>class:content</code> attributes to specifically customize the appearance of the <strong>title</strong> and <strong>content</strong> sections.
        @endslot

        @verbatim('docs')
                <x-accordion class="shadow-xs">
                    <x-accordion-item id="item1" title="Accordion Item 1" class:title="text-base group-hover:no-underline">
                        Lorem ipsum dolor sit amet consectetur.
                    </x-accordion-item>

                    <x-accordion-item id="item2" title="Accordion Item 2" class:title="text-base group-hover:no-underline">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    </x-accordion-item>

                    <x-accordion-item id="item3" title="Accordion Item 3" class:title="text-base group-hover:no-underline">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, cupiditate!
                    </x-accordion-item>
                </x-accordion>
        @endverbatim
    </x-code-block>

</div>
