<form wire:submit="saveSettings" novalidate class="grid grid-cols-1 gap-8 lg:grid-cols-[14rem_minmax(0,1fr)] lg:gap-12">
    <div>
        <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Account settings</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update your profile and choose which emails you get.</p>
    </div>

    <div class="space-y-6">
        <div class="flex items-center gap-4">
            <x-avatar :text="$settingsName ?: 'You'" class="size-14 text-base" />
            <div class="flex gap-2">
                <x-button type="button" label="Change photo" gray outline sm class="normal-case tracking-normal" />
                <x-button type="button" label="Remove" flat gray sm class="text-gray-700 hover:text-gray-950 dark:text-gray-300 dark:hover:text-white normal-case tracking-normal" />
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <x-input label="Full name" wire:model="settingsName" />
            <x-input label="Email" type="email" wire:model="settingsEmail" icon="envelope" />
        </div>

        <x-separator title="Email notifications" />

        <div class="space-y-4">
            <x-toggle label="New orders" wire:model="notifyOrders" />
            <x-toggle label="Mentions and replies" wire:model="notifyMentions" />
            <x-toggle label="Weekly summary" wire:model="notifyDigest" />
        </div>

        <div class="flex justify-end border-t border-gray-200 pt-5 dark:border-gray-800">
            <x-button label="Save settings" spinner="saveSettings" class="normal-case tracking-normal" />
        </div>
    </div>
</form>
