<?php

use Livewire\Component;

new class extends Component {}; ?>

<div class="lg:relative lg:block lg:flex-none"
    :class="{ 'fixed inset-0 z-99 h-screen bg-white dark:bg-slate-900 w-fit pl-6 shadow-sm': sidebarVisible, 'hidden': !
            sidebarVisible }">
    <div class="sticky -ml-0.5 h-[calc(100vh-4.75rem)] w-56 xxs:w-64 overflow-y-auto custom-scrollbar overflow-x-hidden py-16 pl-0.5 pr-8 xl:w-72 xl:pr-16"
        :class="{ '': sidebarVisible, 'top-[4.75rem]': !sidebarVisible }">
        <nav class="text-base lg:text-sm">
            <ul role="list" class="space-y-9">
                <x-sidebar-menu title="Getting Started">
                    <x-sidebar-menu.item title="Installation" :href="route('docs.installation')" />
                    <x-sidebar-menu.item title="Configuration" :href="route('docs.configuration')" />
                    <x-sidebar-menu.item title="Upgrading to v2" :href="route('docs.upgrading')" />
                </x-sidebar-menu>

                <x-sidebar-menu title="Form Components">
                    <x-sidebar-menu.item title="input" :href="route('docs.components.input')" />
                    <x-sidebar-menu.item title="password" :href="route('docs.components.password')" />
                    <x-sidebar-menu.item title="color picker" :href="route('docs.components.color-picker')" />
                    <x-sidebar-menu.item title="textarea" :href="route('docs.components.textarea')" />
                    <x-sidebar-menu.item title="markdown" :href="route('docs.components.markdown')" />
                    <x-sidebar-menu.item title="radio" :href="route('docs.components.radio')" />
                    <x-sidebar-menu.item title="checkbox" :href="route('docs.components.checkbox')" />
                    <x-sidebar-menu.item title="toggle" :href="route('docs.components.toggle')" />
                    <x-sidebar-menu.item title="native select" :href="route('docs.components.native-select')" />
                    <x-sidebar-menu.item title="select" :href="route('docs.components.select')" />
                    <x-sidebar-menu.item title="range" :href="route('docs.components.range')" />
                </x-sidebar-menu>

                <x-sidebar-menu title="UI Components">
                    <x-sidebar-menu.item title="accordion" :href="route('docs.components.accordion')" />
                    <x-sidebar-menu.item title="alert" :href="route('docs.components.alert')" />
                    <x-sidebar-menu.item title="avatar" :href="route('docs.components.avatar')" />
                    <x-sidebar-menu.item title="badge" :href="route('docs.components.badge')" />
                    <x-sidebar-menu.item title="button" :href="route('docs.components.button')" />
                    <x-sidebar-menu.item title="breadcrumb" :href="route('docs.components.breadcrumb')" />
                    <x-sidebar-menu.item title="card" :href="route('docs.components.card')" />
                    <x-sidebar-menu.item title="clipboard" :href="route('docs.components.clipboard')" />
                    <x-sidebar-menu.item title="dropdown" :href="route('docs.components.dropdown')" />
                    <x-sidebar-menu.item title="menu" :href="route('docs.components.menu')" />
                    <x-sidebar-menu.item title="progress" :href="route('docs.components.progress')" />
                    <x-sidebar-menu.item title="progress radial" :href="route('docs.components.progress-radial')" />
                    <x-sidebar-menu.item title="icon" :href="route('docs.components.icon')" />
                    <x-sidebar-menu.item title="rating" :href="route('docs.components.rating')" />
                    <x-sidebar-menu.item title="separator" :href="route('docs.components.separator')" />
                    <x-sidebar-menu.item title="stat" :href="route('docs.components.stat')" />
                    <x-sidebar-menu.item title="spinner" :href="route('docs.components.spinner')" />
                    <x-sidebar-menu.item title="tab" :href="route('docs.components.tab')" />
                    <x-sidebar-menu.item title="table" :href="route('docs.components.table')" />
                    <x-sidebar-menu.item title="tooltip" :href="route('docs.components.tooltip')" />
                </x-sidebar-menu>

                <x-sidebar-menu title="Dialog Components">
                    <x-sidebar-menu.item title="drawer" :href="route('docs.components.drawer')" />
                    <x-sidebar-menu.item title="modal" :href="route('docs.components.modal')" />
                    <x-sidebar-menu.item title="toast" :href="route('docs.components.toast')" />
                </x-sidebar-menu>

                <x-sidebar-menu title="Contributing">
                    <x-sidebar-menu.item title="how to contribute" :href="route('docs.contribution')" />
                </x-sidebar-menu>
            </ul>
        </nav>
    </div>
</div>
