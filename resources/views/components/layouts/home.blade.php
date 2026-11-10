<x-layouts.base :title="$title ?? null" :meta-tags="$metaTags ?? null">
    <main id="main-content" tabindex="-1" class="outline-none">
        {{ $slot }}
    </main>
</x-layouts.base>
