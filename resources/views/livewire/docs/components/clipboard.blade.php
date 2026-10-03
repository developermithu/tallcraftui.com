<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Clipboard components - Tallcraftui')] 
class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Copy to Clipboard Component for Laravel & Tailwind CSS - TallCraftUI" 
            description="Easily implement a copy to clipboard feature with TallCraftUI. Improve user experience with one-click copy features." 
            keywords="Laravel copy to clipboard component, Tailwind CSS copy to clipboard, copy to clipboard component, blade clipboard component, TailwindCSS copy to clipboard"
        />
    @endslot

    @slot('content')
        <x-heading title="Clipboard" subtitle="Form Components" />

        <x-code-block title="Basic usage">
            @verbatim('docs')
                <x-clipboard content="Copied text" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize clipboard">
            @slot('description')
                You can set the default icon using the <code>icon</code> attribute, change the icon displayed after copying with <code>copied-icon</code>, show a custom success message using <code>copied-text</code>, and adjust the duration of the copied state with the <code>timeout</code> option.                
            @endslot

            @verbatim('docs')
                <x-clipboard 
                    content="12345" 
                    icon="document"
                    copied-icon="document-check"
                    copied-text="Text copied!"
                    timeout="5000"
                />
            @endverbatim
        </x-code-block>

        <x-code-block title="Events">
            @slot('description')
                You can trigger custom JavaScript logic using Alpine.js events. The <code>x-on:copy</code> event is fired when the content is successfully copied, allowing you to display a custom alert or any other interaction. The <code>x-on:copy-error</code> event is triggered if the copy action fails, enabling error handling.                
            @endslot

            @verbatim('docs')
                <x-clipboard 
                    content="12345" 
                    x-on:copy="alert(`✅ Copied: ${$event.detail.text}`)"
                    x-on:copy-error="alert(`Error: ${$event.detail.error}`)"
                />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
        </x-on-this-page>
    @endslot
</div>
