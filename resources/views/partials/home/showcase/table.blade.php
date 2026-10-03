<div>
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Team members</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Search filters the rows on the server as you type.</p>
        </div>

        <div class="w-full sm:w-72">
            <x-input wire:model.live.debounce.250ms="search" icon="magnifying-glass" placeholder="Search by name or role" aria-label="Search team members" />
        </div>
    </div>

    <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 dark:border-gray-800">
        <x-table hoverable borderless>
            <x-slot:heading>
                <x-th label="Name" />
                <x-th label="Role" />
                <x-th label="Status" />
                <x-th label="Last active" />
                <x-th><span class="sr-only">Actions</span></x-th>
            </x-slot:heading>

            @forelse ($members as $member)
                <x-tr wire:key="member-{{ $loop->index }}">
                    <x-td>
                        <div class="flex items-center gap-3">
                            <x-avatar :text="$member['name']" class="size-8 text-xs" />
                            <div>
                                <p class="font-medium text-gray-950 dark:text-white">{{ $member['name'] }}</p>
                                <p class="text-xs">{{ $member['email'] }}</p>
                            </div>
                        </div>
                    </x-td>
                    <x-td :label="$member['role']" />
                    <x-td>
                        <x-badge :label="$member['status']" sm :green="$member['status'] === 'Active'" :amber="$member['status'] === 'Invited'" :gray="$member['status'] === 'Suspended'" />
                    </x-td>
                    <x-td :label="$member['active']" />
                    <x-td class="text-right">
                        <x-dropdown>
                            <x-slot:trigger>
                                <x-button icon="ellipsis-horizontal" flat gray circle sm aria-label="Actions for {{ $member['name'] }}" />
                            </x-slot:trigger>

                            <x-dropdown-item label="View profile" icon="user" />
                            <x-dropdown-item label="Change role" icon="shield-check" />
                            <x-dropdown-item label="Remove" icon="trash" class="text-red-600 dark:text-red-400" />
                        </x-dropdown>
                    </x-td>
                </x-tr>
            @empty
                <x-not-found />
            @endforelse
        </x-table>
    </div>
</div>
