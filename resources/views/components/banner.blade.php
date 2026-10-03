@use('Illuminate\Support\Facades\Cache')
@use('Illuminate\Support\Facades\Http')

@php
    $latestRelease = Cache::remember('latest_release', 3600, function () {
        return Http::get('https://api.github.com/repos/developermithu/tallcraftui/releases/latest')->json();
    });

    // $tag = $latestRelease['tag_name'] ?? null;
    // $url = $latestRelease['html_url'] ?? null;

    $tag = 'v3.0.0-beta.1';
    $url = 'https://github.com/developermithu/tallcraftui/releases/tag/v3.0.0-beta.1';
@endphp

<div x-data="{
    bannerVisible: true,
    bannerVisibleAfter: 300,
}" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="-translate-y-10" x-transition:enter-end="translate-y-0"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0"
    x-transition:leave-end="-translate-y-10" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);"
    class="py-3 text-white duration-500 bg-gradient-to-r from-pink-600 to-teal-600 lg:shadow-md lg:rounded-sm" x-cloak data-pan="discord-button">
    <div class="flex items-center justify-center gap-10 px-6 lg:justify-between">
        <a target="_blank" href="{{ $url }}" class="flex items-center gap-2 text-sm text-white">
            <x-icon name="gift" />
            <strong class="font-semibold">TallCraftUI {{ $tag }} is here</strong>
            <span class="hidden w-2 mt-0.5 h-px bg-gray-100 xxs:block"></span>
            <span class="hidden xxs:inline-block"> see what’s new! </span>
        </a>
    </div>
</div>
