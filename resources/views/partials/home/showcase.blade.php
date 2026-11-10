@inject('docs', 'App\Support\Docs')

@php
    $panes = [
        'form' => ['Form', 'pencil-square', ['input', 'native-select', 'textarea', 'toggle', 'button']],
        'table' => ['Data table', 'table-cells', ['input', 'table', 'avatar', 'badge', 'dropdown']],
        'settings' => ['Settings', 'cog-6-tooth', ['avatar', 'input', 'toggle', 'separator', 'button']],
        'auth' => ['Sign in', 'lock-closed', ['input', 'password', 'checkbox', 'button', 'separator']],
        'dialogs' => ['Dialogs and toasts', 'bell', ['modal', 'drawer', 'toast', 'alert', 'button']],
    ];
@endphp

<section class="border-y border-gray-200 bg-gray-50/70 py-20 lg:py-28 dark:border-gray-800 dark:bg-gray-950/30" aria-labelledby="showcase">
    <div class="container">
        <x-home.section-heading id="showcase" title="Real interfaces, not just parts">
            Every screen below is built from TallCraftUI components and wired to Livewire on this page. Submit the forms, search the table, open the dialogs.
        </x-home.section-heading>

        <div class="mt-10">
            <x-tab wire:model="showcaseTab" no-separator class:items="flex-wrap gap-2 space-x-0" class:content="mt-6">
                <x-slot:items>
                    @foreach ($panes as $id => [$label, $icon])
                        <x-tab-item :id="$id" :label="$label" :icon="$icon"
                            class="rounded-full border px-3.5 py-1.5 text-[13px] font-medium normal-case"
                            active-class="border-gray-950 bg-gray-950 text-white! dark:border-white dark:bg-white dark:text-gray-950!"
                            class:icon="size-4" />
                    @endforeach
                </x-slot:items>

                @foreach ($panes as $id => [$label, $icon, $components])
                    <x-tab-content :id="$id">
                        <div class="rounded-[var(--radius-frame)] border border-gray-200 bg-white p-4 shadow-xs sm:p-8 lg:p-10 dark:border-gray-800 dark:bg-gray-900">
                            @include('partials.home.showcase.'.$id)
                        </div>

                        <p class="mt-4 flex flex-wrap items-center gap-2 text-[13px] text-gray-500 dark:text-gray-400">
                            Built with
                            @foreach ($components as $component)
                                @php $page = $docs->pages()->first(fn ($item) => in_array($component, $item['components'] ?? [])); @endphp
                                <a href="{{ $page['href'] ?? '#' }}" wire:navigate class="rounded border border-gray-200 bg-white px-1.5 py-0.5 font-mono text-gray-700 hover:border-gray-300 hover:text-gray-950 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:text-white">&lt;{{ $docs->tag($component) }}&gt;</a>
                            @endforeach
                        </p>
                    </x-tab-content>
                @endforeach
            </x-tab>
        </div>
    </div>
</section>
