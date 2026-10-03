@php
    $orders = [
        ['customer' => 'Olivia Martin', 'email' => 'olivia@northwind.test', 'status' => 'Paid', 'amount' => '$1,999.00'],
        ['customer' => 'Jackson Lee', 'email' => 'jackson@northwind.test', 'status' => 'Pending', 'amount' => '$39.00'],
        ['customer' => 'Isabella Nguyen', 'email' => 'isabella@northwind.test', 'status' => 'Paid', 'amount' => '$299.00'],
        ['customer' => 'William Kim', 'email' => 'will@northwind.test', 'status' => 'Refunded', 'amount' => '$99.00'],
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-[13rem_minmax(0,1fr)]">
    <aside class="hidden border-r border-gray-200 p-3 md:block dark:border-gray-800">
        <x-menu class="mt-0 w-full shadow-none ring-0 dark:bg-transparent">
            <x-menu-item label="Overview" icon="home" class="rounded-md bg-gray-100 text-gray-950 dark:bg-white/5 dark:text-white" />
            <x-menu-item label="Orders" icon="shopping-bag" badge="12" badge-end class="rounded-md" />
            <x-menu-item label="Customers" icon="users" class="rounded-md" />
            <x-menu-item label="Products" icon="cube" class="rounded-md" />
            <x-separator class="my-2" />
            <x-menu-item label="Settings" icon="cog-6-tooth" class="rounded-md" />
        </x-menu>
    </aside>

    <div class="min-w-0 space-y-5 p-4 sm:p-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h3 class="text-lg font-semibold text-gray-950 dark:text-white">Overview</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Northwind Store, last 30 days</p>
            </div>

            <div class="flex items-center gap-2">
                <x-tooltip text="Export as CSV" bottom>
                    <x-button icon="arrow-down-tray" gray outline circle sm aria-label="Export as CSV" />
                </x-tooltip>
                <x-button label="New order" icon="plus" sm class="normal-case tracking-normal" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
            <x-stat title="Revenue" number="$48,290" icon="banknotes" increase="12.5%" />
            <x-stat title="Orders" number="1,284" icon="shopping-bag" increase="4.1%" />
            <x-stat title="Refunds" number="18" icon="receipt-refund" decrease="0.8%" />
        </div>

        <div class="grid grid-cols-1 gap-3 lg:grid-cols-[minmax(0,1fr)_15rem]">
            <x-table borderless class="border border-gray-200 dark:border-gray-800">
                <x-slot:heading>
                    <x-th label="Customer" />
                    <x-th label="Status" />
                    <x-th label="Amount" class="text-right" />
                </x-slot:heading>

                @foreach ($orders as $order)
                    <x-tr>
                        <x-td>
                            <div class="flex items-center gap-3">
                                <x-avatar :text="$order['customer']" class="size-8 text-xs" />
                                <div>
                                    <p class="font-medium text-gray-950 dark:text-white">{{ $order['customer'] }}</p>
                                    <p class="text-xs">{{ $order['email'] }}</p>
                                </div>
                            </div>
                        </x-td>
                        <x-td>
                            <x-badge :label="$order['status']" sm :green="$order['status'] === 'Paid'"
                                :amber="$order['status'] === 'Pending'" :gray="$order['status'] === 'Refunded'" />
                        </x-td>
                        <x-td :label="$order['amount']" class="text-right font-medium tabular-nums text-gray-950 dark:text-white" />
                    </x-tr>
                @endforeach
            </x-table>

            <div class="space-y-4 rounded-lg border border-gray-200 p-4 dark:border-gray-800">
                <p class="text-sm font-medium text-gray-950 dark:text-white">Monthly goal</p>
                <x-progress value="72" label="$48k of $65k" />

                <x-separator />

                <p class="text-sm font-medium text-gray-950 dark:text-white">Top customers</p>
                <x-avatars stacked plus="8">
                    <x-avatar text="Olivia Martin" class="size-9 text-xs" />
                    <x-avatar text="Jackson Lee" class="size-9 text-xs" />
                    <x-avatar text="Isabella Nguyen" class="size-9 text-xs" />
                </x-avatars>
            </div>
        </div>
    </div>
</div>
