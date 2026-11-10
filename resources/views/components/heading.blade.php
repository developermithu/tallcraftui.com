{{-- Page header for documentation pages. `subtitle` is accepted for backwards compatibility; the breadcrumb shows the category. --}}
@props(['title', 'subtitle' => '', 'description' => null])

@inject('docs', 'App\Support\Docs')

@php
    $page = $docs->current();
    $components = $page['components'] ?? [];
    $lead = $description ?? ($page['description'] ?? null);
@endphp

<header class="not-prose mb-10 border-b border-gray-200 pb-8 dark:border-gray-800">
    <h1 class="text-title text-gray-950 dark:text-white">{{ $title }}</h1>

    @if ($lead)
        <div class="mt-4 max-w-[68ch] text-[17px] leading-7 text-gray-600 dark:text-gray-400 [&_a]:font-medium [&_a]:text-brand-700 [&_a]:underline [&_a]:underline-offset-2 dark:[&_a]:text-brand-300 [&_code]:code-inline [&_strong]:font-semibold [&_strong]:text-gray-900 dark:[&_strong]:text-white">
            {{ $lead }}
        </div>
    @endif

    @if (count($components))
        <div class="mt-5 flex flex-wrap items-center gap-2 text-[13px]">
            @foreach ($components as $name)
                <a href="#api-{{ $name }}" class="rounded-md border border-gray-200 bg-gray-50 px-2 py-1 font-mono text-gray-700 hover:border-gray-300 hover:text-gray-950 dark:border-gray-700 dark:bg-white/[0.03] dark:text-gray-300 dark:hover:text-white">&lt;{{ $docs->tag($name) }}&gt;</a>
            @endforeach

            @if ($source = $docs->sourceUrl($components[0]))
                <a href="{{ $source }}" target="_blank" rel="noopener" class="ml-1 inline-flex items-center gap-1.5 px-1 text-gray-500 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white">
                    <x-site.github-icon class="size-3.5" />
                    Source
                </a>
            @endif
        </div>
    @endif
</header>
