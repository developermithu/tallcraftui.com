@props(['page'])

@inject('docs', 'App\Support\Docs')

@php $components = $docs->api($page); @endphp

<section class="not-prose mt-16" aria-labelledby="api-reference">
    <h2 id="api-reference" class=" text-[1.4rem] font-semibold tracking-tight">API reference</h2>

    <p class="mt-3 max-w-[72ch] text-[15.5px] leading-7 text-gray-600 dark:text-gray-400">
        Props are read from the component classes in TallCraftUI {{ $docs->shortVersion() }}. Write them in kebab-case and pass
        booleans as bare attributes, for example <code class="code-inline">&lt;x-button outline /&gt;</code>.
        Other attributes, such as <code class="code-inline">class</code> or <code class="code-inline">wire:model</code>, are passed to the component's element.
    </p>

    <div class="mt-8 space-y-12">
        @foreach ($components as $api)
            <div>
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <h3 id="api-{{ $api['name'] }}" class=" font-mono text-[15px] font-semibold">
                        &lt;{{ $api['tag'] }}&gt;
                    </h3>

                    @if ($api['source'])
                        <a href="{{ $api['source'] }}" target="_blank" rel="noopener"
                            class="inline-flex items-center gap-1 text-[13px] text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            View source
                            <x-icon name="arrow-up-right" class="size-3.5" />
                        </a>
                    @endif
                </div>

                @if (count($api['props']))
                    <div class="mt-3 overflow-hidden rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
                        <x-table borderless class="rounded-none shadow-none">
                            <x-slot:heading>
                                <x-th label="Prop" class="normal-case text-[13px] font-semibold text-gray-900 dark:text-gray-100" />
                                <x-th label="Type" class="normal-case text-[13px] font-semibold text-gray-900 dark:text-gray-100" />
                                <x-th label="Default" class="normal-case text-[13px] font-semibold text-gray-900 dark:text-gray-100" />
                            </x-slot:heading>

                            @foreach ($api['props'] as $prop)
                                <x-tr class="border-t border-gray-200 dark:border-gray-800">
                                    <x-td class="py-2.5 font-mono text-[13px] font-medium text-brand-700 dark:text-brand-300">{{ $prop['name'] }}</x-td>
                                    <x-td class="py-2.5 font-mono text-[13px] text-gray-600 dark:text-gray-400">{{ $prop['type'] }}</x-td>
                                    <x-td class="py-2.5 font-mono text-[13px] text-gray-600 dark:text-gray-400">{{ $prop['default'] ?? '—' }}</x-td>
                                </x-tr>
                            @endforeach
                        </x-table>
                    </div>
                @else
                    <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">This component has no props. Use its slot and attributes.</p>
                @endif

                <dl class="mt-4 space-y-3 text-sm">
                    @foreach ([
                        'Colors' => $api['colors'],
                        'Sizes' => $api['sizes'],
                        'Radius' => $api['rounded'],
                    ] as $label => $values)
                        @if (count($values))
                            <div class="grid gap-1.5 sm:grid-cols-[6rem_1fr]">
                                <dt class="pt-0.5 font-medium text-gray-900 dark:text-gray-200">{{ $label }}</dt>
                                <dd class="flex flex-wrap gap-1.5">
                                    @foreach ($values as $value)
                                        <code class="rounded border border-gray-200 bg-gray-50 px-1.5 py-px font-mono text-xs text-gray-700 dark:border-white/10 dark:bg-white/5 dark:text-gray-300">{{ $value }}</code>
                                    @endforeach
                                </dd>
                            </div>
                        @endif
                    @endforeach

                    @if (count($api['config']))
                        <div class="grid gap-1.5 sm:grid-cols-[6rem_1fr]">
                            <dt class="pt-0.5 font-medium text-gray-900 dark:text-gray-200">Config</dt>
                            <dd class="flex flex-wrap gap-1.5">
                                @foreach ($api['config'] as $key => $value)
                                    <code class="rounded border border-gray-200 bg-gray-50 px-1.5 py-px font-mono text-xs text-gray-700 dark:border-white/10 dark:bg-white/5 dark:text-gray-300">{{ $api['name'] }}.{{ $key }} = {{ is_bool($value) ? ($value ? 'true' : 'false') : $value }}</code>
                                @endforeach
                                <a href="{{ route('docs.configuration') }}" wire:navigate class="self-center text-xs text-gray-500 underline underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Change defaults</a>
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>
        @endforeach
    </div>
</section>
