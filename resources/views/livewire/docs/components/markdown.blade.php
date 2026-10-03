<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Validate};
use App\Models\User;

new #[Layout('components.layouts.app')] #[Title('Markdown components - Tallcraftui')] class extends Component {
    public string $content = 'Hello **world**!';
    public string $content2 = 'Custom **configuration**';

    public function mount(): void
    {
        if (! auth()->user()) {
            auth()->login(User::inRandomOrder()->first());
            request()->session()->regenerate();
        }
    }
}; ?>

<div>
    @assets
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
        <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    @endassets

    @slot('metaTags')
        <x-meta-tags title="Markdown Component for Laravel & Tailwind CSS - TallCraftUI"
            description="Explore the versatile and customizable markdown component from TallCraftUI." />
    @endslot

    <x-heading title="Markdown" subtitle="Form Components" >
        @slot('description')
            This component is powered by <a href='https://github.com/Ionaru/easy-markdown-editor' target='_blank' class="underline">EasyMDE</a>. It's automatically uploads images to <code>local storage</code> or <code>s3</code> disks.
        @endslot
    </x-heading>

    <x-code-block title="Setup" no-render>
        @verbatim('docs')
                <head>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
                </head>
        @endverbatim
    </x-code-block>

    If you're using <strong>local disk</strong> storage, remember to execute this command.

    <x-code language="bash">
        @verbatim
            php artisan storage:link
        @endverbatim
    </x-code>
    
    <x-code-block title="Basic usage">
        @verbatim('docs')
            <x-markdown wire:model="content" />
        @endverbatim
    </x-code-block>

    <div class="pt-1 text-sm opacity-80">
        Please note that <strong>image uploads</strong> are limited to <strong>authenticated</strong> users for security reasons. 
    </div>
    
    <x-code-block title="Image upload settings" no-render>
        @slot('description')
            By default, images are uploaded to the <code>markdown/</code> folder on your <strong>local public disk</strong>. You can customize this setting. 
        @endslot
        
        @verbatim('docs')
            <x-markdown disk="s3" folder="assets/markdown" />
        @endverbatim
    </x-code-block>

    <x-code-block title="Customizing">
        @slot('description')
            You can also customize the default settings for the <strong>markdown</strong> component in the <code>config/tallcraftui.php</code> file.
        @endslot

        @verbatim('docs')
                @php
                    $config = [
                        'spellChecker' => true,
                        'toolbar' => ['heading', 'bold', 'italic', '|', 'preview'],
                        'maxHeight' => '150px',
                    ];
                @endphp

                <x-markdown wire:model="content2" :config="$config" />
        @endverbatim
    </x-code-block>

    <x-code-block language="php" title="Manage markdown image uploads" no-render space-none>
        @slot('description')
            To manage markdown image uploads, use the <strong>HasMarkdownImages</strong> trait. This trait simplifies the process by automatically handling image updates and deletions based on content changes. The default configuration utilizes the <strong>content</strong> column for markdown and the <strong>public</strong> disk for image storage. You can override these settings by adding the following code to your model.
        @endslot
        
        @verbatim('docs')
                use Developermithu\Tallcraftui\Traits\HasMarkdownImages;

                class Post extends Model
                {
                    use HasMarkdownImages;
                
                    protected string $markdownColumn = 'description';
                    protected string $markdownImageDisk = 's3';

                    //
                }   

                // <x-markdown wire:model="description" disk="s3" />
        @endverbatim
    </x-code-block>

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Custom configuration" />
        </x-on-this-page>
    @endslot
</div>
