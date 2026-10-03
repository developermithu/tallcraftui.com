@props(['page'])

@inject('docs', 'App\Support\Docs')

@php $crumbs = $docs->breadcrumbs($page); @endphp

<nav aria-label="Breadcrumb" class="mb-4">
    <ol role="list" class="flex flex-wrap items-center gap-1.5 text-[13px] text-gray-500 dark:text-gray-400">
        @foreach ($crumbs as $label => $url)
            <li class="flex items-center gap-1.5">
                @if (! $loop->first)
                    <x-icon name="chevron-right" class="size-3 text-gray-400 dark:text-gray-600" />
                @endif

                @if ($loop->last)
                    <span aria-current="page" class="font-medium text-gray-900 dark:text-gray-200">{{ $label }}</span>
                @elseif ($url)
                    <a href="{{ $url }}" wire:navigate class="hover:text-gray-900 dark:hover:text-white">{{ $label }}</a>
                @else
                    <span>{{ $label }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
