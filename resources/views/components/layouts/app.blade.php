@inject('docs', 'App\Support\Docs')

@php
    $page = $docs->current();
    $headings = $page ? $docs->headings($page) : [];

    if ($page && ! empty($page['components'])) {
        $headings[] = ['title' => 'API reference', 'id' => 'api-reference', 'level' => 2, 'new' => false];
    }

    if ($page && $docs->related($page)->isNotEmpty()) {
        $headings[] = ['title' => 'Related components', 'id' => 'related-components', 'level' => 2, 'new' => false];
    }
@endphp

<x-layouts.base :title="$title ?? null" :meta-tags="$metaTags ?? null" docs>
    <div class="container">
        <div class="lg:grid lg:grid-cols-[15rem_minmax(0,1fr)] lg:gap-10 xl:grid-cols-[15rem_minmax(0,1fr)_13.5rem] xl:gap-14">
            <aside class="hidden lg:block" aria-label="Documentation">
                <div class="sticky top-16 -ml-3 h-[calc(100dvh-4rem)] overflow-y-auto overscroll-contain py-8 pl-3 pr-3 custom-scrollbar">
                    <x-docs.sidebar />
                </div>
            </aside>

            <main id="main-content" tabindex="-1" class="min-w-0 pb-16 outline-none">
                @if (count($headings) > 1)
                    <x-docs.toc-mobile :headings="$headings" />
                @endif

                <div class="pt-8 lg:pt-10">
                    @if ($page)
                        <x-docs.breadcrumbs :page="$page" />
                    @endif

                    <article class="prose-docs">
                        {{ $content ?? $slot }}
                    </article>

                    @if ($page && ! empty($page['components']))
                        <x-docs.api-reference :page="$page" />
                    @endif

                    @if ($page)
                        <x-docs.related :page="$page" />
                        <x-docs.pager :page="$page" />
                        <x-docs.page-footer :page="$page" />
                    @endif
                </div>
            </main>

            @if (count($headings) > 0)
                <aside class="hidden xl:block" aria-label="On this page">
                    <div class="sticky top-16 max-h-[calc(100dvh-4rem)] overflow-y-auto py-10 custom-scrollbar">
                        <x-docs.toc :headings="$headings" />
                    </div>
                </aside>
            @endif
        </div>
    </div>
</x-layouts.base>
