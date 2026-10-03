{{-- A titled prose section. The title becomes an anchored heading that appears in the table of contents. --}}
@props(['title', 'level' => 2, 'step' => null])

@php $slug = Str::slug($title); @endphp

<section {{ $attributes->class('docs-section') }}>
    @if ((int) $level === 3)
        <h3 id="{{ $slug }}" class="group">
            <a href="#{{ $slug }}" class="text-inherit no-underline">{{ $title }}</a>
        </h3>
    @else
        <h2 id="{{ $slug }}" class="group flex items-center gap-3">
            @if ($step)
                <span class="flex size-7 shrink-0 items-center justify-center rounded-full border border-gray-300 font-mono text-xs font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-200">{{ $step }}</span>
            @endif
            <a href="#{{ $slug }}" class="text-inherit no-underline">{{ $title }}</a>
        </h2>
    @endif

    <div class="mt-4 space-y-5">
        {{ $slot }}
    </div>
</section>
