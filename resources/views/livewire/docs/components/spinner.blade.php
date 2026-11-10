<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Spinner - TallCraftUI Components')] class extends Component {

}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags 
            title="Loading Spinner Components for Laravel & TailwindCSS | TallCraftUI" 
            description="Beautiful and customizable loading spinners and loaders with multiple color variants." 
            keywords="Laravel loading spinners, TailwindCSS loaders, loading indicators, progress spinners, loading animations, Laravel UI components"
        />
    @endslot

    @slot('content')
        <x-heading title="Spinner" subtitle="UI Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                <x-spinner />
                <x-spinner secondary />
                <x-spinner slate />
                <x-spinner zinc />
                <x-spinner gray />
                <x-spinner neutral />
                <x-spinner stone />
                <x-spinner red />
                <x-spinner orange />
                <x-spinner amber />
                <x-spinner yellow />
                <x-spinner lime />
                <x-spinner green />
                <x-spinner emerald />
                <x-spinner teal />
                <x-spinner cyan />
                <x-spinner sky />
                <x-spinner blue />
                <x-spinner indigo />
                <x-spinner violet />
                <x-spinner purple />
                <x-spinner fuchsia />
                <x-spinner pink />
                <x-spinner rose />
                <x-spinner black />
                <x-spinner white />
            @endverbatim
        </x-code-block>

        <x-code-block title="Size variants" inline>
            @verbatim('docs')
                <x-spinner xs />
                <x-spinner sm />
                <x-spinner md /> {{-- default --}}
                <x-spinner lg />
                <x-spinner xl />
            @endverbatim
        </x-code-block>

        <x-code-block title="Spinner dots" inline>
            @verbatim('docs')
                <x-spinner dots />
                <x-spinner secondary dots />
                <x-spinner slate dots />
                <x-spinner zinc dots />
                <x-spinner gray dots />
                <x-spinner neutral dots />
                <x-spinner stone dots />
                <x-spinner red dots />
                <x-spinner orange dots />
                <x-spinner amber dots />
                <x-spinner yellow dots />
                <x-spinner lime dots />
                <x-spinner green dots />
                <x-spinner emerald dots />
                <x-spinner teal dots />
                <x-spinner cyan dots />
                <x-spinner sky dots />
                <x-spinner blue dots />
                <x-spinner indigo dots />
                <x-spinner violet dots />
                <x-spinner purple dots />
                <x-spinner fuchsia dots />
                <x-spinner pink dots />
                <x-spinner rose dots />
                <x-spinner black dots />
                <x-spinner white dots />
            @endverbatim
        </x-code-block>

        <x-code-block title="Spinner bars" inline>
            @verbatim('docs')
                <x-spinner bars />
                <x-spinner secondary bars />
                <x-spinner slate bars />
                <x-spinner zinc bars />
                <x-spinner gray bars />
                <x-spinner neutral bars />
                <x-spinner stone bars />
                <x-spinner red bars />
                <x-spinner orange bars />
                <x-spinner amber bars />
                <x-spinner yellow bars />
                <x-spinner lime bars />
                <x-spinner green bars />
                <x-spinner emerald bars />
                <x-spinner teal bars />
                <x-spinner cyan bars />
                <x-spinner sky bars />
                <x-spinner blue bars />
                <x-spinner indigo bars />
                <x-spinner violet bars />
                <x-spinner purple bars />
                <x-spinner fuchsia bars />
                <x-spinner pink bars />
                <x-spinner rose bars />
                <x-spinner black bars />
                <x-spinner white bars />
            @endverbatim
        </x-code-block>

        <x-code-block title="Spinner pulse" inline>
            @verbatim('docs')
                <x-spinner pulse />
                <x-spinner secondary pulse />
                <x-spinner slate pulse />
                <x-spinner zinc pulse />
                <x-spinner gray pulse />
                <x-spinner neutral pulse />
                <x-spinner stone pulse />
                <x-spinner red pulse />
                <x-spinner orange pulse />
                <x-spinner amber pulse />
                <x-spinner yellow pulse />
                <x-spinner lime pulse />
                <x-spinner green pulse />
                <x-spinner emerald pulse />
                <x-spinner teal pulse />
                <x-spinner cyan pulse />
                <x-spinner sky pulse />
                <x-spinner blue pulse />
                <x-spinner indigo pulse />
                <x-spinner violet pulse />
                <x-spinner purple pulse />
                <x-spinner fuchsia pulse />
                <x-spinner pink pulse />
                <x-spinner rose pulse />
                <x-spinner black pulse />
                <x-spinner white pulse />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize spinner">
            @slot('description')
                You can easily customize any <strong>spinner</strong> using standard <code>css</code> classes.
            @endslot
            
            @verbatim('docs')
                <x-spinner class="text-blue-400 size-10" />
            @endverbatim
        </x-code-block>
    @endslot

</div>
