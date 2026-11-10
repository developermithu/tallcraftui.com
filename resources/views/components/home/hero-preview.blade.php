{{-- The dashboard is live TallCraftUI. The Blade view shows the exact file it renders from. --}}
@php
    $source = file_get_contents(resource_path('views/components/home/snippets/dashboard.blade.php'));
@endphp

<div x-data="{ view: 'preview' }" {{ $attributes->class('overflow-hidden rounded-[var(--radius-frame)] border border-gray-200 bg-white shadow-float dark:border-gray-700 dark:bg-gray-900') }}>
    <div class="flex items-center gap-3 border-b border-gray-200 bg-gray-50 px-3 py-2 dark:border-gray-800 dark:bg-gray-950/40">
        <div class="hidden gap-1.5 sm:flex" aria-hidden="true">
            <span class="size-2.5 rounded-full bg-gray-300 dark:bg-gray-700"></span>
            <span class="size-2.5 rounded-full bg-gray-300 dark:bg-gray-700"></span>
            <span class="size-2.5 rounded-full bg-gray-300 dark:bg-gray-700"></span>
        </div>

        <span class="truncate font-mono text-xs text-gray-500 dark:text-gray-400" x-text="view === 'preview' ? 'northwind.test/dashboard' : 'resources/views/dashboard.blade.php'">northwind.test/dashboard</span>

        <div role="tablist" aria-label="Dashboard example" class="ml-auto flex rounded-md bg-gray-200/70 p-0.5 text-xs font-medium dark:bg-white/5">
            <button type="button" role="tab" id="hero-tab-preview" aria-controls="hero-panel-preview" :aria-selected="(view === 'preview').toString()" @click="view = 'preview'"
                :class="view === 'preview' ? 'bg-white text-gray-950 shadow-xs dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white'"
                class="flex items-center gap-1.5 rounded px-2.5 py-1 transition-colors">
                <x-icon name="eye" class="size-3.5" /> Preview
            </button>
            <button type="button" role="tab" id="hero-tab-code" aria-controls="hero-panel-code" :aria-selected="(view === 'code').toString()" @click="view = 'code'"
                :class="view === 'code' ? 'bg-white text-gray-950 shadow-xs dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:text-gray-950 dark:text-gray-400 dark:hover:text-white'"
                class="flex items-center gap-1.5 rounded px-2.5 py-1 transition-colors">
                <x-icon name="code-bracket" class="size-3.5" /> Blade
            </button>
        </div>
    </div>

    <div class="relative h-[34rem] lg:h-[37rem]">
        <div id="hero-panel-preview" role="tabpanel" aria-labelledby="hero-tab-preview" x-show="view === 'preview'" class="absolute inset-0 overflow-y-auto">
            <x-home.snippets.dashboard />
        </div>

        <div id="hero-panel-code" role="tabpanel" aria-labelledby="hero-tab-code" x-show="view === 'code'" x-cloak class="absolute inset-0 overflow-y-auto bg-code">
            <x-docs.code-panel :code="$source" :collapse="false" filename="dashboard.blade.php" />
        </div>
    </div>
</div>
