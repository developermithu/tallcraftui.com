<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Configuration - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @php
        // The published config file, read from the installed package so this page never drifts from it.
        $configFile = @file_get_contents(base_path('vendor/developermithu/tallcraftui/config/tallcraftui.php')) ?: '';

        $defaults = collect(config('tallcraftui'))
            ->except(['prefix', 'route_prefix', 'icons', 'upload', 'markdown'])
            ->filter(fn ($value) => is_array($value));
    @endphp

    @slot('metaTags')
        <x-meta-tags title="TallCraftUI configuration: prefix, icons and component defaults"
            description="Publish config/tallcraftui.php to set a component prefix, the icon style, Markdown upload rules and default sizes, colors, radius and behavior for each component." />
    @endslot

    <x-heading title="Configuration">
        <x-slot:description>
            TallCraftUI works without any configuration. Publish the config file when you want a component prefix or different defaults, such as a larger button size or toasts in another corner.
        </x-slot:description>
    </x-heading>

    <x-docs.section title="Publish the configuration file">
        <x-code language="bash">
            @verbatim
                php artisan vendor:publish --tag=tallcraftui-config
            @endverbatim
        </x-code>

        <p>
            This creates <code>config/tallcraftui.php</code>. Keys you leave out keep their default values, and keys added in later releases are filled in automatically, so an older published file keeps working.
        </p>

        <x-docs.callout type="warning" title="Clear the view cache after changes">
            Component defaults are compiled into your views. Run <code>php artisan view:clear</code> after editing the config file.
        </x-docs.callout>
    </x-docs.section>

    <x-docs.section title="Component prefix">
        <p>
            By default components are available as <code>&lt;x-button&gt;</code>, <code>&lt;x-input&gt;</code> and so on.
            Set a prefix to avoid clashing with components your app already has:
        </p>

        <x-code language="php" filename="config/tallcraftui.php">
            @verbatim
                'prefix' => env('TALLCRAFTUI_PREFIX', ''),

                // 'prefix' => ''     -> <x-input />
                // 'prefix' => 'tc-'  -> <x-tc-input />
            @endverbatim
        </x-code>

        <p>Or set it in <code>.env</code> without publishing the config:</p>

        <x-code language="env" filename=".env">
            @verbatim
                TALLCRAFTUI_PREFIX="tc-"
            @endverbatim
        </x-code>

        <p>Then clear the view cache:</p>

        <x-code language="bash">
            @verbatim
                php artisan view:clear
            @endverbatim
        </x-code>
    </x-docs.section>

    <x-docs.section title="Icons">
        <p>
            Components use <a href="https://heroicons.com" target="_blank" rel="noopener">Heroicons</a> through <code>blade-ui-kit/blade-heroicons</code>.
            Choose the <code>outline</code> or <code>solid</code> style for all components:
        </p>

        <x-code language="php" filename="config/tallcraftui.php">
            @verbatim
                'icons' => [
                    'type' => 'heroicons',
                    'style' => 'outline', // outline or solid
                ],
            @endverbatim
        </x-code>
    </x-docs.section>

    <x-docs.section title="Component defaults">
        <p>
            Each component reads its default size, radius, shadow, position or behavior from its own key. A prop or attribute on a single component always wins over the default.
            These are the defaults this site runs with:
        </p>

        <div class="not-prose overflow-x-auto rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
            <table class="w-full min-w-[30rem] text-left text-sm">
                <thead class="bg-gray-50 text-gray-900 dark:bg-white/[0.03] dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Key</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">Settings</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($defaults as $key => $settings)
                        <tr class="align-top">
                            <td class="whitespace-nowrap px-4 py-2.5 font-mono text-[13px] font-medium text-gray-950 dark:text-white">{{ $key }}</td>
                            <td class="px-4 py-2.5">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($settings as $name => $value)
                                        @if (is_scalar($value))
                                            <code class="rounded border border-gray-200 bg-gray-50 px-1.5 py-px font-mono text-xs text-gray-700 dark:border-white/10 dark:bg-white/5 dark:text-gray-300">{{ $name }}: {{ is_bool($value) ? ($value ? 'true' : 'false') : $value }}</code>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p>
            Values come from enums in <code>Developermithu\Tallcraftui\Enums</code>, such as <code>Size::LG->value</code> or <code>BorderRadius::RoundedLg->value</code>, but plain strings like <code>'lg'</code> work too.
        </p>
    </x-docs.section>

    <x-docs.section title="Markdown uploads">
        <p>
            <a href="{{ route('docs.components.markdown') }}" wire:navigate><code>&lt;x-markdown&gt;</code></a> uploads images through an endpoint that TallCraftUI registers.
            The <code>upload</code> section controls who can use it and what it accepts:
        </p>

        <x-code language="php" filename="config/tallcraftui.php">
            @verbatim
                'upload' => [
                    'enabled' => env('TALLCRAFTUI_UPLOAD_ENABLED', true),
                    'middleware' => ['web', 'auth'],
                    'disks' => ['public'],
                    'mimes' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'],
                    'max_size' => 2048, // in kilobytes
                ],
            @endverbatim
        </x-code>

        <p>Set <code>TALLCRAFTUI_UPLOAD_ENABLED=false</code> to remove the upload route entirely. SVG and HTML files are always rejected.</p>
    </x-docs.section>

    <x-docs.section title="Full configuration file">
        <p>The complete file as published by TallCraftUI {{ app(App\Support\Docs::class)->shortVersion() }}:</p>

        <x-code language="php" filename="config/tallcraftui.php" :code="$configFile" />
    </x-docs.section>
</div>
