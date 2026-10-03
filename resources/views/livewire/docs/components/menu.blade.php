<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Menu components - Tallcraftui')] class extends Component {
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Menu components - Tallcraftui" description="Menu components - Tallcraftui" />
    @endslot

    @slot('content')
        <x-heading title="Menu" subtitle="UI Components" />

        <x-code-block title="Basic usage" inline>
            @verbatim('docs')
                {{--  Menu 1 --}}
                <x-menu w-48>
                    <x-menu-item label="Edit" />
                    <x-menu-item label="Duplicate" />
                    <x-menu-item label="Archive" />
                    <x-menu-item label="Share" />
                    <x-menu-item label="Add to Favorites" />
                    <x-menu-item label="Delete" />
                </x-menu>

                {{--  Menu 2 --}}
                <x-menu>
                    <x-menu-item label="Edit" icon="pencil-square" />
                    <x-menu-item label="Duplicate" icon="document-duplicate" />
                    <x-menu-item label="Archive" icon="archive-box" />

                    <x-separator />
                    <x-menu-item label="Share" icon="user-plus" />
                    <x-menu-item label="Add to Favorites" icon="heart" />

                    <x-separator />
                    <x-menu-item label="Delete" icon="trash" />
                </x-menu>

                {{--  Menu 3 --}}
                <x-menu title="Menu">
                    <x-menu-item label="Edit" icon="pencil-square" />
                    <x-menu-item label="Duplicate" icon="document-duplicate" />

                    <x-separator />
                    <x-menu-item label="Archive" icon="archive-box" badge="25" badge-end />
                    <x-menu-item label="Move" icon="arrow-right-circle" />

                    <x-separator title="Actions" />
                    <x-menu-item label="Share" icon="user-plus" badge="New" />
                    <x-menu-item label="Add to Favorites" icon="heart" />

                    <x-separator />
                    <x-menu-item label="Delete" icon="trash" />
                </x-menu>
            @endverbatim
        </x-code-block>

        <x-code-block title="Menu with link" inline>
            @verbatim('docs')
                <x-menu>
                    <x-menu-item label="View" icon="eye" link="#" />
                    <x-menu-item label="Edit" icon="pencil-square" link="#" external />
                    <x-menu-item label="Delete" icon="trash" link="#" no-wire-navigate />
                </x-menu>
            @endverbatim
        </x-code-block>

        <x-code-block title="Customization" inline>
            @verbatim('docs')
                <x-menu class="rounded-sm shadow-md ring-primary/20 dark:ring-primary/20 shadow-primary/20">
                    <x-menu-item label="Edit" icon="pencil-square"
                        class="hover:bg-primary/10 dark:hover:bg-primary/10 hover:text-primary dark:hover:text-primary"
                        class:icon="group-hover:text-primary dark:group-hover:text-primary" />

                    <x-separator class="bg-primary/20 dark:bg-primary/20" />

                    <x-menu-item label="Archive" icon="archive-box" badge="25" badge-end
                        class="hover:bg-primary/10 dark:hover:bg-primary/10 hover:text-primary dark:hover:text-primary"
                        class:icon="group-hover:text-primary dark:group-hover:text-primary"
                        class:badge="bg-primary dark:bg-primary text-white dark:text-white" />
                </x-menu>
            @endverbatim
        </x-code-block>

        <h2 class="pt-5 pb-2" id="default-settings">Default settings</h2>

        <p>Change menu default settings according your needs <code>config/tallcraftui.php</code> </p>

        <x-code language="php">
            @verbatim
                return [
                'menu' => [
                'width' => Width::W56->value,
                'shadow' => Shadow::Shadow->value,
                'border-radius' => BorderRadius::RoundedMd->value,
                ],
                ];
            @endverbatim
        </x-code>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Menu with link" />
            <x-on-this-page.item title="Customization" />
            <x-on-this-page.item title="Default settings" />
        </x-on-this-page>
    @endslot
</div>
