@inject('docs', 'App\Support\Docs')

@php
    $suggestions = collect(['docs.installation', 'docs.theming', 'docs.components.button', 'docs.components.input', 'docs.components.modal', 'docs.components.table', 'docs.components.toast'])
        ->map(fn (string $route) => $docs->find($route))
        ->filter()
        ->map(fn (array $page) => [
            'title' => $page['title'],
            'section' => $page['section'],
            'type' => ($page['group'] ?? null) === 'components' ? 'Component' : 'Page',
            'description' => $page['description'],
            'url' => $page['href'],
        ])
        ->values();
@endphp

<div x-data="docsSearch(@js(route('search.index')), @js($suggestions))"
    @open-search.window="show()"
    @prefetch-search.window="load()"
    @keydown.window.meta.k.prevent="open ? close() : show()"
    @keydown.window.ctrl.k.prevent="open ? close() : show()"
    @keydown.window.slash="if (!open && !['INPUT', 'TEXTAREA', 'SELECT'].includes($event.target.tagName) && !$event.target.isContentEditable) { $event.preventDefault(); show() }">
    <template x-teleport="body">
        <div x-show="open" x-cloak class="fixed inset-0 z-[200] flex items-start justify-center px-3 pt-[12vh] sm:px-6"
            role="dialog" aria-modal="true" aria-label="Search documentation" @keydown.escape.prevent.stop="close()">
            <div x-show="open" x-transition.opacity.duration.150ms class="fixed inset-0 bg-gray-950/50 backdrop-blur-[2px]"
                @click="close()"></div>

            <div x-show="open" x-trap.inert.noscroll="open"
                x-transition:enter="transition duration-150 ease-out" x-transition:enter-start="translate-y-1 opacity-0 scale-[0.98]"
                x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                class="relative flex max-h-[min(36rem,76vh)] w-full max-w-xl flex-col overflow-hidden rounded-[var(--radius-frame)] border border-gray-200 bg-white shadow-float dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center gap-3 border-b border-gray-200 px-4 dark:border-gray-700">
                    <x-icon name="magnifying-glass" class="size-5 shrink-0 text-gray-400" />

                    <input x-ref="input" x-model="query" @input="selected = 0" type="search"
                        @keydown.arrow-down.prevent="move(1)" @keydown.arrow-up.prevent="move(-1)"
                        @keydown.enter.prevent="go()"
                        role="combobox" aria-autocomplete="list" aria-controls="search-results" :aria-expanded="results.length > 0"
                        :aria-activedescendant="results.length ? `search-option-${selected}` : null"
                        placeholder="Search components, guides and examples"
                        aria-label="Search documentation" autocomplete="off" spellcheck="false"
                        class="h-14 w-full border-0 bg-transparent px-0 text-[15px] text-gray-950 placeholder:text-gray-400 focus:outline-none focus:ring-0 dark:text-white [&::-webkit-search-cancel-button]:hidden">

                    <button type="button" @click="close()" class="kbd h-6 px-1.5 hover:text-gray-900 dark:hover:text-white" aria-label="Close search">Esc</button>
                </div>

                <div class="min-h-0 flex-1 overflow-y-auto overscroll-contain p-2">
                    <p x-show="!query.trim()" class="px-3 pb-1 pt-2 text-xs font-medium text-gray-500 dark:text-gray-400">Popular</p>

                    <ul id="search-results" role="listbox" aria-label="Search results" x-show="results.length">
                        <template x-for="(entry, i) in results" :key="entry.url">
                            <li :id="`search-option-${i}`" role="option" :aria-selected="(selected === i).toString()"
                                @click="go(entry)" @mousemove="selected = i"
                                :class="selected === i ? 'bg-gray-100 dark:bg-white/[0.07]' : ''"
                                class="flex cursor-pointer items-center gap-3 rounded-md px-3 py-2.5">
                                <span class="flex size-8 shrink-0 items-center justify-center rounded-md border border-gray-200 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                    <x-icon name="cube" class="size-4" x-show="entry.type === 'Component'" />
                                    <x-icon name="document-text" class="size-4" x-show="entry.type === 'Page'" />
                                    <x-icon name="hashtag" class="size-4" x-show="entry.type === 'Section'" />
                                </span>

                                <span class="min-w-0 flex-1">
                                    <span class="block truncate text-sm font-medium text-gray-950 dark:text-white" x-text="entry.title"></span>
                                    <span class="block truncate text-xs text-gray-500 dark:text-gray-400"
                                        x-text="entry.type === 'Section' ? `${entry.section}` : (entry.description ?? entry.section)"></span>
                                </span>

                                <x-icon name="arrow-turn-down-left" class="size-4 shrink-0 text-gray-400" x-show="selected === i" />
                            </li>
                        </template>
                    </ul>

                    <div x-show="query.trim() && !results.length" class="px-4 py-10 text-center">
                        <p x-show="loading" class="text-sm text-gray-500">Loading the search index…</p>
                        <template x-if="!loading">
                            <div>
                                <p class="text-sm font-medium text-gray-950 dark:text-white">No results for “<span x-text="query.trim()"></span>”</p>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Try a component name such as “modal”, or a feature such as “spinner”.</p>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="hidden items-center gap-4 border-t border-gray-200 px-4 py-2.5 text-xs text-gray-500 sm:flex dark:border-gray-700 dark:text-gray-400">
                    <span class="flex items-center gap-1.5"><span class="kbd">↑</span><span class="kbd">↓</span> to move</span>
                    <span class="flex items-center gap-1.5"><span class="kbd">↵</span> to open</span>
                    <span class="flex items-center gap-1.5"><span class="kbd">Esc</span> to close</span>
                </div>
            </div>
        </div>
    </template>
</div>
