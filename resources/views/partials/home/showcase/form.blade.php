<form wire:submit="createProject" novalidate class="mx-auto max-w-2xl">
    <div class="border-b border-gray-200 pb-5 dark:border-gray-800">
        <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Create a project</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Projects group your deployments, domains and team. Try submitting with empty fields.</p>
    </div>

    <div class="grid gap-5 py-6 sm:grid-cols-2">
        <x-input label="Project name" wire:model="projectName" placeholder="Northwind Store" required />
        <x-input label="Domain" wire:model="projectDomain" prefix="https://" placeholder="northwind.test" />

        <x-native-select label="Region" wire:model="projectRegion" :options="[
            ['id' => 'eu-west', 'name' => 'Europe (Frankfurt)'],
            ['id' => 'us-east', 'name' => 'US East (Virginia)'],
            ['id' => 'ap-south', 'name' => 'Asia Pacific (Singapore)'],
        ]" without-placeholder />

        <x-native-select label="Framework" wire:model="projectStack" :options="[
            ['id' => 'livewire', 'name' => 'Laravel + Livewire'],
            ['id' => 'inertia', 'name' => 'Laravel + Inertia'],
            ['id' => 'api', 'name' => 'Laravel API'],
        ]" without-placeholder />

        <div class="sm:col-span-2">
            <x-textarea label="Description" wire:model="projectDescription" hint="Optional. Shown to your team only." rows="3" />
        </div>

        <div class="sm:col-span-2">
            <x-toggle label="Private project, visible to invited members only" wire:model="projectPrivate" />
        </div>
    </div>

    <div class="flex justify-end gap-2 border-t border-gray-200 pt-5 dark:border-gray-800">
        <x-button type="button" label="Cancel" flat gray wire:click="resetProject" class="text-gray-700 hover:text-gray-950 dark:text-gray-300 dark:hover:text-white normal-case tracking-normal" />
        <x-button label="Create project" spinner="createProject" class="normal-case tracking-normal" />
    </div>
</form>
