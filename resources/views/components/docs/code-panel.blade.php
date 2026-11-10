{{-- Dark code surface with a language label, a copy button and a collapse toggle for long snippets. --}}
@props(['code', 'language' => 'blade', 'copy' => true, 'filename' => null, 'tab' => null, 'collapse' => true])

@php
    $lines = substr_count($code, "\n") + 1;
    $collapsible = $collapse && $lines > 16;
    $label = $filename ?? App\Support\Docs::languageLabel($language);
@endphp

<div @unless ($tab) x-data="docsCode(@js($code), @js($collapsible))" @else x-data="{ index: null, collapsed: false }" x-init="index = register(@js($tab), @js($code))" x-show="index === active" @endunless
    {{ $attributes->class('code-surface relative') }}>
    @unless ($tab)
        <div class="flex h-10 items-center justify-between gap-3 border-b border-white/[0.07] pl-4 pr-2 sm:pl-5">
            <span class="truncate font-mono text-xs text-gray-400">{{ $label }}</span>

            @if ($copy)
                <x-docs.copy-button />
            @endif
        </div>
    @endunless

    <div class="relative" :class="collapsed && 'max-h-[22rem] overflow-hidden'">
        <pre><x-torchlight-code language="{{ $language }}">{!! $code !!}</x-torchlight-code></pre>

        @if ($collapsible)
            <div x-show="collapsed" class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-linear-to-t from-code to-transparent"></div>
        @endif
    </div>

    @if ($collapsible)
        <button type="button" @click="collapsed = !collapsed" :aria-expanded="(!collapsed).toString()"
            class="flex w-full items-center justify-center gap-1.5 border-t border-white/[0.07] py-2 text-xs font-medium text-gray-400 transition-colors hover:bg-white/[0.03] hover:text-gray-200">
            <span x-text="collapsed ? @js("Show all {$lines} lines") : 'Collapse'"></span>
            <x-icon name="chevron-down" class="size-3.5 transition" ::class="!collapsed && 'rotate-180'" />
        </button>
    @endif
</div>
