<section class="border-y border-gray-200 bg-gray-50/70 py-20 lg:py-28 dark:border-gray-800 dark:bg-gray-950/30" aria-labelledby="boilerplate">
    <div class="container">
        <x-home.section-heading id="boilerplate" title="One tag instead of three">
            A labelled input with its validation error takes three components in Laravel's starter kits. In TallCraftUI it's one, and the error handling comes with it.
        </x-home.section-heading>

        <div class="mt-12 grid max-w-4xl grid-cols-1 gap-8">
            <div>
                <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">Laravel starter kits: three tags per field</p>
                <x-docs.code-group>
                    <x-code tab="Breeze">
                        @verbatim
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        @endverbatim
                    </x-code>
                    <x-code tab="Jetstream">
                        @verbatim
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required />
                            <x-input-error for="name" class="mt-2" />
                        @endverbatim
                    </x-code>
                </x-docs.code-group>
            </div>

            <div>
                <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">TallCraftUI: one tag per field</p>
                <x-code filename="Blade">
                    @verbatim
                        <x-input label="Name" wire:model="name" required />
                    @endverbatim
                </x-code>

                <ul role="list" class="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-600 dark:text-gray-400">
                    @foreach (['Label linked to the input', 'Required marker', 'Validation error under the field', 'Dark mode styles'] as $item)
                        <li class="flex items-center gap-2">
                            <x-icon name="check" class="size-4 text-brand-600 dark:text-brand-400" />
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
