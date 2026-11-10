<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Danger zone</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Destructive actions ask for confirmation in a modal.</p>
        </div>

        <div class="flex flex-wrap items-center justify-between gap-4 rounded-lg border border-red-200 p-4 dark:border-red-500/30">
            <div>
                <p class="font-medium text-gray-950 dark:text-white">Delete this project</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Removes all deployments and domains.</p>
            </div>
            <x-button label="Delete project" red outline sm x-on:click="$wire.confirmDelete = true" class="normal-case tracking-normal" />
        </div>

        <div class="flex flex-wrap items-center justify-between gap-4 rounded-lg border border-gray-200 p-4 dark:border-gray-800">
            <div>
                <p class="font-medium text-gray-950 dark:text-white">Invite teammates</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Opens a drawer with a short form.</p>
            </div>
            <x-button label="Invite" icon="user-plus" sm gray outline x-on:click="$wire.inviteDrawer = true" class="normal-case tracking-normal" />
        </div>
    </div>

    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Notifications</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Toasts from a Livewire action, and inline alerts.</p>
        </div>

        <div class="flex flex-wrap gap-2">
            <x-button label="Success" green sm wire:click="notify('success')" class="normal-case tracking-normal" />
            <x-button label="Error" red sm wire:click="notify('error')" class="normal-case tracking-normal" />
            <x-button label="Warning" amber sm wire:click="notify('warning')" class="normal-case tracking-normal" />
            <x-button label="Info" blue sm wire:click="notify('info')" class="normal-case tracking-normal" />
        </div>

        <x-alert title="Deployment finished" description="northwind.test is live. It took 42 seconds." green />
        <x-alert title="Your trial ends in 3 days" description="Add a payment method to keep your projects online." amber dismissible />
    </div>

    <x-modal wire:model="confirmDelete" md center>
        <div class="p-2 text-center">
            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-500/15">
                <x-icon name="exclamation-triangle" class="size-6 text-red-600 dark:text-red-400" />
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-950 dark:text-white">Delete Northwind Store?</h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">All deployments and domains are removed. This can't be undone.</p>

            <div class="mt-6 flex justify-center gap-2">
                <x-button label="Cancel" gray outline x-on:click="$dispatch('close')" class="normal-case tracking-normal" />
                <x-button label="Delete project" red wire:click="deleteProject" spinner="deleteProject" class="normal-case tracking-normal" />
            </div>
        </div>
    </x-modal>

    <x-drawer wire:model="inviteDrawer" title="Invite teammates" md>
        <form wire:submit="sendInvite" novalidate class="space-y-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">They'll get an email with a link to join Northwind Store.</p>
            <x-input label="Email address" type="email" wire:model="inviteEmail" placeholder="teammate@example.com" />
            <x-native-select label="Role" wire:model="inviteRole" :options="[['id' => 'member', 'name' => 'Member'], ['id' => 'admin', 'name' => 'Admin']]" without-placeholder />
            <x-button label="Send invite" spinner="sendInvite" class="w-full justify-center normal-case tracking-normal" />
        </form>
    </x-drawer>
</div>
