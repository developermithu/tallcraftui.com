<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('components.layouts.app')] #[Title('Select - TallCraftUI Components')] class extends Component {}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Select components - Tallcraftui" description="Select components - Tallcraftui" />
    @endslot

    @slot('content')
        <x-heading title="Select" subtitle="Form Components">
            @slot('description')
                By default, selection will look up for:

                <ul class="pb-5">
                    <li><code>$object->id</code> for option <strong>value</strong>.</li>
                    <li><code>$object->name</code> or <code>$object->title</code> for option <strong>label</strong>.</li>
                    <li><code>$object->avatar</code> or <code>$object->image</code> for option <strong>picture</strong>.</li>
                    <li><code>$object->description</code> for option <strong>description</strong>.</li>
                </ul>
            @endslot
        </x-heading>

        <x-code-block title="Basic usage" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::get(); // OR
                    // $users = App\Models\User::pluck('name', 'id');
                @endphp

                <x-select wire:model="user_id" :options="$users" />
                <x-select wire:model="skills" :options="['PHP', 'Laravel', 'Livewire']" multiple clearable />
            @endverbatim
        </x-code-block>

        <x-code-block title="Multiple select" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-select wire:model="user_id" :options="$users" multiple />
            @endverbatim
        </x-code-block>

        <x-code-block title="Clearable" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-select wire:model="user_id" :options="$users" multiple clearable />
            @endverbatim
        </x-code-block>

        <x-code-block title="Searchable" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-select wire:model="user_id" :options="$users" multiple searchable />
            @endverbatim
        </x-code-block>

        <x-code-block title="Limit selection" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-select wire:model="user_id" :options="$users" limit="2" multiple />
            @endverbatim
        </x-code-block>

        <x-code-block title="With image" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name', 'email', 'avatar');
                @endphp

                <x-select wire:model="user_id" :options="$users" multiple />
            @endverbatim
        </x-code-block>

        <x-code-block title="With description" space-0.5>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name', 'bio as description');
                @endphp

                <x-select wire:model="user_id" :options="$users" multiple />
            @endverbatim
        </x-code-block>

        <x-code-block title="With enum class" space-0.5>
            @verbatim('docs')
                @php
                    // enum UserRolesEnum: string
                    // {
                    //     case Admin = 'admin';
                    //     case User = 'user';
                    //     case Moderator = 'moderator';

                    //     public static function options(): array
                    //     {
                    //         return array_column(self::cases(), 'name', 'value');
                    //     }
                    // }
                @endphp

                <x-select wire:model="role" :options="App\Enums\UserRolesEnum::options()" />
            @endverbatim
        </x-code-block>

        <x-code-block title="All property">
            @verbatim('docs')
                @php
                    $options = [
                        [
                            'id' => 1,
                            'name' => 'Taylor Otwell',
                            'avatar' => 'https://avatars.githubusercontent.com/u/463230?s=160&v=4',
                            'description' => 'Creator of Laravel',
                        ],
                        [
                            'id' => 2,
                            'name' => 'Caleb Porzio',
                            'avatar' => 'https://github.com/calebporzio.png?size=160',
                            'description' => 'Creator of Livewire and Alpine.js',
                        ],
                        [
                            'id' => 3,
                            'name' => 'Nuno Maduro',
                            'avatar' => 'https://avatars.githubusercontent.com/u/5457236?v=4',
                            'description' => 'Creator of Pest PHP',
                        ],
                        [
                            'id' => 4,
                            'name' => 'Jeffrey Way',
                            'avatar' => 'https://github.com/JeffreyWay.png?size=160',
                            'description' => 'Creator of Laracast',
                        ],
                    ];
                @endphp

                <x-select label="Users" :options="$options" limit="3" placeholder="Select user"
                    hint="Only 3 user can be select" multiple searchable clearable />
            @endverbatim
        </x-code-block>

        <x-code-block no-render title="Size variants">
            @verbatim('docs')
                <x-select xs />
                <x-select sm />
                <x-select md />
                <x-select lg />
                <x-select xl />
            @endverbatim
        </x-code-block>
    @endslot

</div>
