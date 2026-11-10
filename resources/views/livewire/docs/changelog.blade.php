<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('components.layouts.app')] #[Title('Changelog - TallCraftUI Docs')] class extends Component
{
    //
}; ?>

<div>
    @php
        $releases = collect(require resource_path('data/changelog.php'));
        $major = fn (string $version) => (int) explode('.', $version)[0];
        $v3 = $releases->filter(fn ($release) => $major($release['version']) === 3);
        $v2 = $releases->filter(fn ($release) => $major($release['version']) === 2);
        $v1 = $releases->filter(fn ($release) => $major($release['version']) <= 1);
    @endphp

    @slot('metaTags')
        <x-meta-tags title="TallCraftUI changelog: releases and what's new"
            description="Every TallCraftUI release from 0.9 to {{ $releases->first()['version'] }}, with breaking changes, new components, fixes and security updates." />
    @endslot

    <x-heading title="Changelog">
        <x-slot:description>
            Every TallCraftUI release, newest first. TallCraftUI follows <a href="https://semver.org" target="_blank" rel="noopener">semantic versioning</a>; breaking changes only land in major versions.
            Upgrading? Read the <a href="{{ route('docs.upgrading') }}" wire:navigate>upgrade guide</a>.
        </x-slot:description>
    </x-heading>

    <x-docs.section title="Version 3.x">
        <div>
            @foreach ($v3 as $release)
                <x-docs.release :release="$release" />
            @endforeach
        </div>
    </x-docs.section>

    <x-docs.section title="Version 2.x">
        <div>
            @foreach ($v2 as $release)
                <x-docs.release :release="$release" />
            @endforeach
        </div>
    </x-docs.section>

    <x-docs.section title="Version 1.x and earlier">
        <div>
            @foreach ($v1 as $release)
                <x-docs.release :release="$release" />
            @endforeach
        </div>
    </x-docs.section>
</div>
