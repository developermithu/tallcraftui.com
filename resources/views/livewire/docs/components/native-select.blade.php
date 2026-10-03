<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

new 
#[Layout('components.layouts.app')] 
#[Title('Native Select components - Tallcraftui')] 
class extends Component {}; ?>

<div>
    @slot('metaTags')
        <x-meta-tags title="Native Select components - Tallcraftui" description="Native Select components - Tallcraftui" />
    @endslot

    @slot('content')
        <x-heading title="Native Select" subtitle="Form Components">
            @slot('description')
                By default, selection will look up for:

                <ul class="pb-5">
                    <li><code>$object->id</code> for option <strong>value</strong>.</li>
                    <li><code>$object->name</code> for option <strong>label</strong>.</li>
                </ul>
            @endslot
        </x-heading>

        <x-code-block title="Basic usage">
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name'); // OR
                    // $users = App\Models\User::pluck('name', 'id');
                @endphp

                <x-native-select label="Users" wire:model="user_id" :options="$users" />
            @endverbatim
        </x-code-block>

        <x-code-block title="Customize option attributes" new>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'bio')->take(5); 
                @endphp

                <x-native-select 
                    wire:model="user_id" 
                    :options="$users" 
                    option-value="id" 
                    option-label="bio"
                />
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom placeholder">
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-native-select 
                    wire:model="user_id" 
                    :options="$users" 
                    placeholder="Select user" 
                />
            @endverbatim
        </x-code-block>

        <x-code-block title="Without placeholder" new>
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-native-select 
                    wire:model="user_id" 
                    :options="$users" 
                    without-placeholder
                />
            @endverbatim
        </x-code-block>

        <x-code-block title="Custom slot">
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-native-select label="Select user">
                    <option value="">Choose user</option>
                    
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
                    @endforeach
                </x-native-select>
            @endverbatim
        </x-code-block>

        <x-code-block title="With hint">
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-native-select wire:model="user_id" :options="$users" hint="Only one user can be select" />
            @endverbatim
        </x-code-block>

      <x-code-block title="Size variants">
            @verbatim('docs')
                @php
                    $users = App\Models\User::all('id', 'name');
                @endphp

                <x-native-select placeholder="Default" :options="$users" xs />
                <x-native-select placeholder="Small" :options="$users" sm />
                <x-native-select placeholder="Medium" :options="$users" md />
                <x-native-select placeholder="Large" :options="$users" lg />
                <x-native-select placeholder="Extra large" :options="$users" xl />
            @endverbatim
        </x-code-block> 

        <x-code-block title="With enum class" new>
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

                <x-native-select wire:model="role" :options="App\Enums\UserRolesEnum::options()" />
            @endverbatim
        </x-code-block>
    @endslot

    @slot('aside')
        <x-on-this-page>
            <x-on-this-page.item title="Basic usage" />
            <x-on-this-page.item title="Customize option attributes" new />
            <x-on-this-page.item title="Custom placeholder" />
            <x-on-this-page.item title="Without placeholder" new />
            <x-on-this-page.item title="Custom slot" />
            <x-on-this-page.item title="With hint" />
            <x-on-this-page.item title="Size variants" />
            <x-on-this-page.item title="With enum class" new />
        </x-on-this-page>
    @endslot
</div>
