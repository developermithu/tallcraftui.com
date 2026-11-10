<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Upgrade guide - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Upgrade TallCraftUI to 3.0 - Step-by-Step Guide"
            description="Upgrade TallCraftUI from 2.x to 3.0 for Livewire 4 and Laravel 13: requirements, CSS changes, wire:model behavior, Markdown uploads and table sorting. Also covers 1.x to 2.0." />
    @endslot

    <x-heading title="Upgrade guide">
        <x-slot:description>
            Upgrading from 2.x to 3.0 takes about 30 minutes for most apps. 3.0 keeps every component tag, prop, variant attribute and config key from 2.x.
            The breaking changes are the platform requirements, a few <code>wire:model</code> behaviors and the hardened Markdown upload endpoint.
        </x-slot:description>
    </x-heading>

    <x-docs.callout type="tip" title="Before you start">
        Commit your work so you can review the changes with git. If you get stuck, ask on <a href="{{ config('docs.discord') }}" target="_blank" rel="noopener">Discord</a> or
        <a href="{{ config('docs.repository') }}/issues" target="_blank" rel="noopener">open an issue</a>.
    </x-docs.callout>

    <x-docs.section title="Requirements">
        <div class="not-prose overflow-x-auto rounded-[var(--radius-panel)] border border-gray-200 dark:border-gray-800">
            <table class="w-full min-w-[26rem] text-left text-sm">
                <thead class="bg-gray-50 text-gray-900 dark:bg-white/[0.03] dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-4 py-2.5 font-semibold"></th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">2.x</th>
                        <th scope="col" class="px-4 py-2.5 font-semibold">3.0</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 dark:divide-gray-800 dark:text-gray-400">
                    @foreach ([['PHP', '8.1+', '8.2+'], ['Laravel', '10, 11, 12', '12, 13'], ['Livewire', '3', '4'], ['Tailwind CSS', '4', '4.1+'], ['Alpine.js', 'bundled with Livewire', 'bundled with Livewire']] as [$name, $old, $new])
                        <tr>
                            <th scope="row" class="px-4 py-2.5 font-medium text-gray-950 dark:text-white">{{ $name }}</th>
                            <td class="px-4 py-2.5">{{ $old }}</td>
                            <td @class(['px-4 py-2.5', 'font-semibold text-gray-950 dark:text-white' => $old !== $new])>{{ $new }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p>2.x stays available for Livewire 3 apps and receives bug fixes only.</p>
    </x-docs.section>

    <x-docs.section title="Upgrade to Livewire 4 first" step="1">
        <p>
            Follow the official <a href="https://livewire.laravel.com/docs/upgrading" target="_blank" rel="noopener">Livewire 4 upgrade guide</a> and make sure your app works before upgrading TallCraftUI.
        </p>
    </x-docs.section>

    <x-docs.section title="Update the package" step="2">
        <x-code language="bash">
            @verbatim
                composer require developermithu/tallcraftui:^3.0
            @endverbatim
        </x-code>

        <p>While 3.0 is in beta, use <code>developermithu/tallcraftui:^3.0@beta</code>.</p>
    </x-docs.section>

    <x-docs.section title="Update your CSS" step="3">
        <p>Republish the stylesheet. It now registers the component source path itself and ships default <code>primary</code> and <code>secondary</code> colors:</p>

        <x-code language="bash">
            @verbatim
                php artisan vendor:publish --tag=tallcraftui-css --force
            @endverbatim
        </x-code>

        <p>Your <code>resources/css/app.css</code> should contain:</p>

        <x-code language="css" filename="resources/css/app.css">
            @verbatim
                @import 'tailwindcss';
                @import './tallcraftui.css';
                @plugin '@tailwindcss/forms';
                @custom-variant dark (&:where(.dark, .dark *));
            @endverbatim
        </x-code>

        <ul>
            <li>The <code>@custom-variant dark</code> line enables class-based dark mode, which <code>&lt;x-theme-toggle /&gt;</code> needs. Leave it out if dark mode should follow the operating system only.</li>
            <li>The <code>@source '../../vendor/developermithu/tallcraftui/src/**/*.php';</code> line in <code>app.css</code> is no longer needed, but it's harmless to keep.</li>
            <li>Defining <code>--color-primary</code> and <code>--color-secondary</code> in your own <code>@theme</code> is now optional. Your values always override the defaults (<code>#6d28d9</code> and <code>#a21caf</code>).</li>
            <li>If you still have a <code>tailwind.config.js</code> entry for TallCraftUI, you can remove it. The installer no longer edits that file.</li>
        </ul>

        <p>Alternatively, re-run the installer. It only adds lines that are missing:</p>

        <x-code language="bash">
            @verbatim
                php artisan install:tallcraftui
            @endverbatim
        </x-code>
    </x-docs.section>

    <x-docs.section title="Review behavior changes" step="4">
        <x-docs.section title="Select and Color Picker follow wire:model modifiers" level="3">
            <p>
                In 2.x, <code>&lt;x-select&gt;</code> and <code>&lt;x-color-picker&gt;</code> sent every change to the server immediately, whatever modifier you used.
                They now behave like any other <code>wire:model</code> input: the value syncs on the next request. Add <code>.live</code> if you need immediate updates:
            </p>

            <x-code>
                @verbatim
                    <x-select wire:model.live="country" :options="$countries" />
                @endverbatim
            </x-code>
        </x-docs.section>

        <x-docs.section title="Livewire 4 wire:model changes" level="3">
            <p>These come from Livewire itself and apply to TallCraftUI inputs too:</p>
            <ul>
                <li><code>.blur</code> and <code>.change</code> now also delay syncing the value in the browser. Use <code>wire:model.live.blur</code> for the Livewire 3 behavior.</li>
                <li><code>wire:model</code> ignores <code>input</code> events bubbling up from child elements. Use <code>.deep</code> to restore the Livewire 3 behavior on your own wrappers.</li>
            </ul>
        </x-docs.section>

        <x-docs.section title="Markdown image uploads" level="3">
            <p>The upload endpoint used by <code>&lt;x-markdown&gt;</code> is stricter:</p>
            <ul>
                <li>Only the formats in <code>tallcraftui.upload.mimes</code> are accepted (jpg, jpeg, png, gif, webp, avif by default), up to <code>tallcraftui.upload.max_size</code> (2 MB by default). SVG files are rejected.</li>
                <li>Only disks listed in <code>tallcraftui.upload.disks</code> are accepted (<code>public</code> by default).</li>
                <li>The <code>folder</code> prop must be a plain path such as <code>markdown</code> or <code>posts/images</code>.</li>
                <li>The CSRF token is sent as a header instead of a query string parameter.</li>
            </ul>
            <p>
                If you published the config, you don't need to change it: new keys are filled in automatically.
                To customize them, add the <a href="{{ route('docs.configuration') }}#markdown-uploads" wire:navigate><code>upload</code> section</a> to <code>config/tallcraftui.php</code>.
                Set <code>TALLCRAFTUI_UPLOAD_ENABLED=false</code> to remove the upload route entirely.
            </p>
        </x-docs.section>

        <x-docs.section title="Markdown image cleanup" level="3">
            <p>
                <code>HasMarkdownImages</code> now only deletes images inside the model's markdown folder, so user-written markdown can't delete other files on the disk.
                If your <code>&lt;x-markdown&gt;</code> uses a <code>folder</code> other than <code>markdown</code>, set it on the model:
            </p>

            <x-code language="php">
                @verbatim
                    protected string $markdownImageFolder = 'posts/images';
                @endverbatim
            </x-code>
        </x-docs.section>

        <x-docs.section title="WithTcTable" level="3">
            <ul>
                <li>
                    The trait's <code>updated()</code> hook is now <code>updatedWithTcTable()</code>, so it runs alongside your component's own <code>updated()</code>.
                    If you aliased the trait method to avoid a conflict (for example <code>use WithTcTable { updated as tcUpdated; }</code>), remove the alias.
                </li>
                <li>Define <code>tcSortableColumns()</code> to whitelist the columns users can sort by. See <a href="#deprecations">deprecations</a>.</li>
            </ul>
        </x-docs.section>

        <x-docs.section title="Clickable table rows" level="3">
            <p>
                <code>&lt;x-tr href="..."&gt;</code> no longer navigates when you click a button, link or form control inside the row.
                Add <code>wire:navigate</code> to the row to navigate with Livewire; Ctrl/Cmd-click opens the link in a new tab. <code>javascript:</code> URLs are ignored.
            </p>
        </x-docs.section>

        <x-docs.section title="Toast helpers" level="3">
            <p>
                The global functions <code>getPositionStyle</code>, <code>getPositionClasses</code>, <code>getAnimationClasses</code>, <code>getProgressBarColor</code> and <code>getProgressBarStyle</code> were removed from <code>window</code>.
                <code>window.toast()</code> and the <code>tallcraftui-toast</code> event are unchanged.
            </p>
        </x-docs.section>

        <x-docs.section title="Class merging" level="3">
            <p>
                TallCraftUI now depends on <code>gehrisandro/tailwind-merge-php</code> directly instead of <code>gehrisandro/tailwind-merge-laravel</code>, which blocked installs on Laravel 13 apps using Guzzle 8.
                The <code>twMerge</code>, <code>twMergeFor</code> and <code>withoutTwMergeClasses</code> attribute macros work as before, and a published <code>config/tailwind-merge.php</code> is still used.
            </p>
            <p>If your own views use the <code>@twMerge</code> Blade directive or the global <code>twMerge()</code> helper, require the Laravel package yourself:</p>

            <x-code language="bash">
                @verbatim
                    composer require gehrisandro/tailwind-merge-laravel
                @endverbatim
            </x-code>
        </x-docs.section>
    </x-docs.section>

    <x-docs.section title="Deprecations" step="5">
        <p>
            Sorting a <code>WithTcTable</code> component without a whitelist triggers an <code>E_USER_DEPRECATED</code> notice, which Laravel writes to your deprecations log channel.
            The whitelist will be required in 4.0. Add it to each table component:
        </p>

        <x-code language="php">
            @verbatim
                public function tcSortableColumns(): array
                {
                    return ['name', 'email', 'created_at', 'author.name'];
                }
            @endverbatim
        </x-code>

        <p>Sort columns outside the list are ignored.</p>
    </x-docs.section>

    <x-docs.section title="Troubleshooting">
        <dl class="not-prose space-y-5 text-[15px] leading-7">
            <div>
                <dt class="font-semibold text-gray-950 dark:text-white">"Detected multiple instances of Alpine running" or components don't respond</dt>
                <dd class="mt-1 text-gray-700 dark:text-gray-300">Livewire 4 already includes Alpine and the plugins TallCraftUI uses. Remove <code class="code-inline">import Alpine from 'alpinejs'</code> and <code class="code-inline">Alpine.start()</code> from <code class="code-inline">resources/js/app.js</code>.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-950 dark:text-white">Components have no styles</dt>
                <dd class="mt-1 text-gray-700 dark:text-gray-300">Make sure <code class="code-inline">app.css</code> imports <code class="code-inline">./tallcraftui.css</code>, republish it with <code class="code-inline">--force</code>, and rebuild your assets with <code class="code-inline">npm run dev</code> or <code class="code-inline">npm run build</code>.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-950 dark:text-white">The dark mode toggle does nothing</dt>
                <dd class="mt-1 text-gray-700 dark:text-gray-300">Add <code class="code-inline">@custom-variant dark (&amp;:where(.dark, .dark *));</code> to <code class="code-inline">app.css</code>.</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-950 dark:text-white">Primary-colored components look violet</dt>
                <dd class="mt-1 text-gray-700 dark:text-gray-300">That's the new default. Define <code class="code-inline">--color-primary</code> and <code class="code-inline">--color-secondary</code> in your own <code class="code-inline">@theme</code>.</dd>
            </div>
        </dl>
    </x-docs.section>

    <x-docs.section title="Upgrading from 1.x to 2.0">
        <p>
            TallCraftUI 2.0 requires Tailwind CSS 4, Laravel 10 or later and Livewire 3. The <a href="https://v1-tallcraftui.developermithu.com" target="_blank" rel="noopener">1.x documentation</a> is still online.
        </p>

        <x-docs.section title="Upgrade Tailwind CSS" level="3">
            <p>If you're on an older Tailwind version, upgrade it first. See the official <a href="https://tailwindcss.com/docs/upgrade-guide" target="_blank" rel="noopener">Tailwind CSS upgrade guide</a>.</p>

            <x-code language="bash">
                @verbatim
                    npx @tailwindcss/upgrade
                @endverbatim
            </x-code>
        </x-docs.section>

        <x-docs.section title="Install TallCraftUI 2.0" level="3">
            <x-code language="bash">
                @verbatim
                    composer require developermithu/tallcraftui:^2.0
                    php artisan install:tallcraftui
                @endverbatim
            </x-code>
        </x-docs.section>

        <x-docs.section title="Update the configuration file" level="3">
            <p>Remove the old <code>config/tallcraftui.php</code>, publish the new one and review it for new options:</p>

            <x-code language="bash">
                @verbatim
                    rm config/tallcraftui.php
                    php artisan vendor:publish --tag=tallcraftui-config
                    php artisan view:clear
                @endverbatim
            </x-code>
        </x-docs.section>

        <x-docs.section title="Rename select to native-select" level="3">
            <p>
                The 1.x <code>&lt;x-select&gt;</code> was renamed to <code>&lt;x-native-select&gt;</code>, to make room for a new <code>&lt;x-select&gt;</code> with search, multiple selection and custom styling. Update every old select:
            </p>

            <x-code>
                @verbatim
                    <!-- Before (1.x) -->
                    <x-select wire:model="country" ... />

                    <!-- After (2.0) -->
                    <x-native-select wire:model="country" ... />

                    <!-- The new select (optional, different API) -->
                    <x-select wire:model="user_id" ... />
                @endverbatim
            </x-code>
        </x-docs.section>
    </x-docs.section>
</div>
