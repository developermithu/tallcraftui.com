@props([
    'title' => '',
    'language' => 'blade',
    'noRender' => false,
    'inline' => false,
    'new' => false,
    'noCopy' => false,
    'hideButton' => false,
])

@php
    $slug = Str::slug($title);
    $code = App\Support\Docs::cleanCode((string) $slot);
@endphp

<div {{ $attributes->only('id')->merge(['class' => 'docs-example']) }}>
    @if ($title)
        <h2 id="{{ $slug }}" class="group flex items-center gap-2.5">
            <a href="#{{ $slug }}" class="text-inherit no-underline">{{ $title }}</a>
            <span aria-hidden="true" class="hidden text-gray-300 group-hover:inline dark:text-gray-600">#</span>

            @if ($new)
                <span class="rounded-full bg-brand-100 px-2 py-0.5 text-[11px] font-semibold text-brand-800 dark:bg-brand-400/15 dark:text-brand-200">New</span>
            @endif
        </h2>
    @endif

    @isset($description)
        <div class="mt-3 space-y-3">{{ $description }}</div>
    @endisset

    <div class="not-prose mt-5 rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
        @unless ($noRender)
            <div @class([
                'preview-canvas flex min-w-0 flex-col gap-4 p-5 sm:p-8',
                'rounded-t-[calc(var(--radius-panel)-1px)]',
                'rounded-b-[calc(var(--radius-panel)-1px)]' => $hideButton,
                'flex-row! flex-wrap items-center' => $inline,
            ])>
                <?php echo Blade::render($code); ?>
            </div>
        @endunless

        @unless ($hideButton)
            <x-docs.code-panel :code="$code" :language="$language" :copy="! $noCopy" @class([
                'rounded-b-[calc(var(--radius-panel)-1px)]',
                'rounded-t-[calc(var(--radius-panel)-1px)]' => $noRender,
                'border-t border-gray-200 dark:border-gray-800' => ! $noRender,
            ]) />
        @endunless
    </div>
</div>
