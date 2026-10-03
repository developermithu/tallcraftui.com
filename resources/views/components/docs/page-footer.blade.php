@props(['page'])

@inject('docs', 'App\Support\Docs')

<div class="mt-10 flex flex-wrap items-center justify-between gap-3 border-t border-gray-200 pt-6 text-[13px] text-gray-500 dark:border-gray-800 dark:text-gray-400">
    @if ($url = $docs->editUrl($page))
        <a href="{{ $url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 hover:text-gray-900 dark:hover:text-white">
            <x-icon name="pencil-square" class="size-4" />
            Edit this page on GitHub
        </a>
    @endif

    <span>
        Code highlighting by <a href="https://torchlight.dev" target="_blank" rel="noopener" class="underline underline-offset-2 hover:text-gray-900 dark:hover:text-white">Torchlight</a>
    </span>
</div>
