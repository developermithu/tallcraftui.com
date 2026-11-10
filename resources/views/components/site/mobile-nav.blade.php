{{-- Mobile navigation, built on TallCraftUI's drawer. --}}
<div x-data @open-mobile-nav.window="Alpine.$data($refs.drawer.firstElementChild).open = true" class="lg:hidden">
    <div x-ref="drawer">
        <x-drawer left sm without-dismissible no-separator id="mobile-nav">
            <div class="-mx-4 -mt-5 flex h-full flex-col sm:-mx-5">
                <div class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 px-4 dark:border-gray-700">
                    <x-site.logo />
                    <button type="button" @click="open = false" aria-label="Close navigation"
                        class="inline-flex size-9 items-center justify-center rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-950 dark:hover:bg-white/5 dark:hover:text-white">
                        <x-icon name="x-mark" class="size-5" />
                    </button>
                </div>

                <div class="flex-1 overflow-y-auto px-1 py-5">
                    <button type="button" @click="open = false; $dispatch('open-search')"
                        class="mx-3 mb-6 flex h-10 w-[calc(100%-1.5rem)] items-center gap-2 rounded-md border border-gray-200 bg-gray-50 px-3 text-sm text-gray-500 dark:border-gray-700 dark:bg-white/[0.03] dark:text-gray-400">
                        <x-icon name="magnifying-glass" class="size-4" />
                        Search docs
                    </button>

                    <div class="mb-8 flex flex-wrap gap-2 px-3 sm:hidden">
                        <x-site.version-switcher />
                    </div>

                    <x-docs.sidebar class="text-[15px]" />
                </div>
            </div>
        </x-drawer>
    </div>
</div>
