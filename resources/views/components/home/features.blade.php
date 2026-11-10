<section class="container py-20 lg:py-28" aria-labelledby="why">
    <x-home.section-heading id="why" title="Why TallCraftUI">
        Components that fit how Laravel developers already work: Blade tags, Livewire bindings and Tailwind classes. Nothing new to learn, a lot less to write.
    </x-home.section-heading>

    <dl class="mt-14 grid gap-x-10 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([
            ['code-bracket-square', 'Blade-native', 'Components are Blade tags with props. No JavaScript framework, no build step for the components themselves.'],
            ['bolt', 'Made for Livewire', 'Bind any input with wire:model. Validation errors for the bound property show up under the field without extra markup.'],
            ['paint-brush', 'Styled with Tailwind', 'Pass classes to override any default. They are merged with tailwind-merge, so yours win and nothing doubles up.'],
            ['moon', 'Dark mode included', 'Every component has dark styles, and a theme toggle component switches modes and remembers the choice.'],
            ['adjustments-horizontal', 'Your defaults', 'Set default sizes, radius, positions and timeouts once in config/tallcraftui.php, and add a prefix if names clash.'],
            ['heart', 'Free and open source', 'MIT licensed and developed in the open on GitHub. Every release is documented in the changelog.'],
        ] as [$icon, $title, $text])
            <div class="border-t border-gray-200 pt-6 dark:border-gray-800">
                <dt class="flex items-center gap-2.5 font-semibold text-gray-950 dark:text-white">
                    <x-icon :name="$icon" class="size-5 text-brand-600 dark:text-brand-400" />
                    {{ $title }}
                </dt>
                <dd class="mt-2 text-[15px] leading-7 text-gray-600 dark:text-gray-400">{{ $text }}</dd>
            </div>
        @endforeach
    </dl>
</section>
