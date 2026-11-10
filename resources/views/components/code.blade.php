@props(['language' => 'blade', 'noRender' => false, 'noCopy' => false, 'filename' => null, 'tab' => null, 'code' => null])

@php
    $code = App\Support\Docs::cleanCode($code ?? (string) $slot);
@endphp

@if ($tab)
    <x-docs.code-panel :code="$code" :language="$language" :copy="! $noCopy" :tab="$tab" />
@else
    <div {{ $attributes->except(['space-none', 'space-0.5', 'space-1'])->class('not-prose overflow-hidden rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800') }}>
        <x-docs.code-panel :code="$code" :language="$language" :copy="! $noCopy" :filename="$filename" />
    </div>
@endif
