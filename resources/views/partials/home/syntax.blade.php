@php
    $snippet = <<<'BLADE'
<form wire:submit="subscribe" class="space-y-4" novalidate>
    <x-input
        label="Email"
        type="email"
        wire:model="email"
        hint="One email a month. No spam."
    />

    <x-button label="Subscribe" spinner="subscribe" />
</form>
BLADE;
@endphp

<section class="container py-20 lg:py-28" aria-labelledby="syntax">
    <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-[minmax(0,5fr)_minmax(0,7fr)] lg:gap-16">
        <div class="lg:sticky lg:top-28">
            <x-home.section-heading id="syntax" title="Know Blade? You already know TallCraftUI.">
                Components are plain Blade tags. Props configure them, <code class="code-inline">wire:model</code> binds them and Tailwind classes restyle them.
            </x-home.section-heading>

            <ul role="list" class="mt-8 space-y-4 text-[15px] leading-6 text-gray-700 dark:text-gray-300">
                @foreach ([
                    ['link', '<code class="code-inline">wire:model</code> binds the input to a Livewire property, like any form field.'],
                    ['exclamation-circle', 'Validation errors for <code class="code-inline">email</code> appear under the field. Submit the form empty to see it.'],
                    ['arrow-path', '<code class="code-inline">spinner="subscribe"</code> shows a loading state and disables the button while the action runs.'],
                ] as [$icon, $text])
                    <li class="flex gap-3">
                        <x-icon :name="$icon" class="mt-0.5 size-5 shrink-0 text-brand-600 dark:text-brand-400" />
                        <span>{!! $text !!}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="overflow-hidden rounded-[var(--radius-frame)] border border-gray-200 shadow-xs dark:border-gray-800">
            <x-docs.code-panel :code="$snippet" :collapse="false" filename="subscribe-form.blade.php" />

            <div class="preview-canvas border-t border-gray-200 p-6 sm:p-10 dark:border-gray-800">
                <div class="max-w-sm">
                    {!! Blade::render(str_replace('wire:model="email"', 'wire:model="subscribeEmail"', $snippet)) !!}
                </div>
            </div>
        </div>
    </div>
</section>
