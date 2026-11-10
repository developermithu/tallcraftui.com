@props(['title', 'id' => null])

<div {{ $attributes->class('max-w-2xl') }}>
    <h2 @if ($id) id="{{ $id }}" @endif class="text-title text-gray-950 dark:text-white">{{ $title }}</h2>

    @if ($slot->isNotEmpty())
        <p class="mt-4 text-[17px] leading-7 text-gray-600 dark:text-gray-400">{{ $slot }}</p>
    @endif
</div>
