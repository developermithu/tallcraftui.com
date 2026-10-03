<div x-data="{ visibleFullExampleTableCode: false }">
    @slot('metaTags')
        <x-meta-tags 
            title="Dynamic Livewire Table Components for Laravel & TailwindCSS | TallCraftUI" 
            description="Feature-rich table components with sorting, pagination, searching, and responsive design." 
            keywords="Laravel table components, TailwindCSS tables, data tables, sortable tables, searchable tables, Laravel UI components, data grid"
        />
    @endslot
    
    <x-heading title="Table" subtitle="UI Components" />
    
    <div class="flex items-center justify-between py-5">
        <h2 id="basic-usage" class="group">
            <a href="#basic-usage"
                class="absolute -ml-8 no-underline transition opacity-0 group-hover:opacity-70">#</a>
            Basic usage
        </h2>
    
        <x-button @click="visibleFullExampleTableCode = !visibleFullExampleTableCode" icon="code-bracket" flat sm />
    </div>

    <div x-show="!visibleFullExampleTableCode" x-cloak>
        <x-table :paginate="$users" :per-page="[5, 10, 20, 50]" searchable hoverable>
            @slot('heading')
                <x-th label="Id" sortable :$sortCol :$sortAsc />
                <x-th label="Name" sortable :$sortCol :$sortAsc />
                <x-th label="Email" sortable :$sortCol :$sortAsc />
                <x-th label="Active" />
                <x-th label="Actions" />
            @endslot

            @forelse ($users as $user)
                <x-tr>
                    <x-td :label="$user->id" />
                    <x-td :label="$user->name" />
                    <x-td :label="$user->email" />
                    <x-td>
                        @if ($user->is_active)
                            <x-icon name="check-circle" class="text-green-500 size-6" />
                        @else
                            <x-icon name="x-circle" class="text-red-500 size-6" />
                        @endif
                    </x-td>
                    <x-td class="space-x-2">
                        <x-dropdown>
                            @slot('trigger')
                                <x-button icon="ellipsis-vertical" flat gray circle />
                            @endslot

                            <x-dropdown-item label="View" icon="eye" />
                            <x-dropdown-item label="Edit" icon="pencil-square" />
                            <x-dropdown-item label="Delete" icon="trash" />
                        </x-dropdown>
                    </x-td>
                </x-tr>
            @empty
                <x-not-found />
            @endforelse

            @slot('filters')
                <x-dropdown title="Filters" persistent w-56>
                    @slot('trigger')
                        <x-button icon="funnel" flat gray sm />
                    @endslot

                    <div class="p-4 space-y-3">
                        <x-toggle wire:model.live="is_active" label="Active" />
                        <x-toggle wire:model.live="email_verified_at" label="Email verified" />
                    </div>
                </x-dropdown>
            @endslot
        </x-table>
    </div>

    <div x-show="visibleFullExampleTableCode" x-cloak>
    <x-code-block no-render space-0.5>
        @verbatim('docs')
                @php
                    use App\Models\User;
                    use Livewire\Component;
                    use Developermithu\Tallcraftui\Traits\WithTcTable;

                    class Table extends Component
                    {
                        use WithTcTable;

                        public bool $is_active = false;
                        public bool $email_verified_at = false;

                        public function render()
                        {
                            $users = User::query()
                                ->when($this->tcSearch, function ($query) {
                                    $query->where('name', 'LIKE', '%' . $this->tcSearch . '%');
                                })
                                ->when($this->is_active, function ($query) {
                                    $query->where('is_active', true);
                                })
                                ->when($this->email_verified_at, function ($query) {
                                    $query->whereNotNull('email_verified_at');
                                })
                                ->tap(fn($query) => $this->tcApplySorting($query))
                                ->paginate($this->tcPerPage);

                            return view('livewire.table', compact('users'));
                        }
                    }
                @endphp

                <x-table :paginate="$users" :per-page="[5, 10, 20, 50]" searchable hoverable>
                    <x-slot:heading>
                        <x-th label="Id" sortable :$sortCol :$sortAsc />
                        <x-th label="Name" sortable :$sortCol :$sortAsc />
                        <x-th label="Email" sortable :$sortCol :$sortAsc />
                        <x-th label="Active" />
                        <x-th label="Actions" />
                    </x-slot:heading>

                    @forelse ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                            <x-td>
                                @if ($user->is_active)
                                    <x-icon name="check-circle" class="text-green-500 size-6" />
                                @else
                                    <x-icon name="x-circle" class="text-red-500 size-6" />
                                @endif
                            </x-td>
                            <x-td class="space-x-2">
                                <x-dropdown>
                                    <x-slot:trigger>
                                        <x-button icon="ellipsis-vertical" flat gray circle />
                                    </x-slot:trigger>

                                    <x-dropdown-item label="View" icon="eye" />
                                    <x-dropdown-item label="Edit" icon="pencil-square" />
                                    <x-dropdown-item label="Delete" icon="trash" />
                                </x-dropdown>
                            </x-td>
                        </x-tr>
                    @empty
                        <x-not-found />
                    @endforelse

                    {{-- Filters --}}
                    <x-slot:filters>
                        <x-dropdown title="Filters" persistent w-56>
                            <x-slot:trigger>
                                <x-button icon="funnel" flat gray sm />
                            </x-slot:trigger>

                            <div class="p-4 space-y-3">
                                <x-toggle wire:model.live="is_active" label="Active" />
                                <x-toggle wire:model.live="email_verified_at" label="Email verified" />
                            </div>
                        </x-dropdown>
                    </x-slot:filters>
                </x-table>
        @endverbatim
    </x-code-block>
    </div>

    <x-code-block title="Simple table">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get();
                @endphp
                
                <x-table>
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                        <x-th label="Actions" />
                    </x-slot:heading>

                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                            <x-td>
                                <x-button link="#" label="Edit" icon="pencil-square" amber flat sm />
                                <x-button link="#" label="Delete" icon="trash" red flat sm />
                            </x-td>
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Without border">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get();
                @endphp

                <x-table borderless>
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                    </x-slot:heading>

                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Striped style">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get(); 
                @endphp

                <x-table borderless striped> 
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                    </x-slot:heading>

                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Without header">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get();
                @endphp

                <x-table borderless>
                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Hoverable">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get();
                @endphp

                <x-table borderless hoverable>
                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Clickable">
        @verbatim('docs')
                @php
                    $users = App\Models\User::take(5)->get();
                @endphp

                <x-table borderless>
                    @foreach ($users as $user)
                        <x-tr :href="route('docs.components.table')">
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>
    
    <x-code-block title="With searching">
        @verbatim('docs')
                @php
                    // Include `WithTcTable` trait
                    // use Developermithu\Tallcraftui\Traits\WithTcTable;
                    
                    $users = App\Models\User::query()
                            ->when($this->tcSearch, function ($query) {
                                $query->where('name', 'LIKE', '%' . $this->tcSearch . '%');
                            })
                            ->take(5)->get();
                @endphp
                
                <x-table searchable>
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                    </x-slot:heading>

                    @forelse ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @empty
                        <x-not-found />
                    @endforelse
                </x-table>
        @endverbatim
    </x-code-block>
    
    <x-code-block title="With pagination">
        @verbatim('docs')
                @php
                    $users = App\Models\User::paginate(3);
                @endphp
                
                <x-table :paginate="$users">
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                    </x-slot:heading>

                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>
    
    <x-code-block title="With per page">
        @verbatim('docs')
                @php
                    // Include `WithTcTable` trait
                    // use Developermithu\Tallcraftui\Traits\WithTcTable;
                    
                    $users = App\Models\User::paginate($this->tcPerPage);
                @endphp
                
                {{-- You can also add custom option :per-page="[5, 10, 20]" --}}
                <x-table :paginate="$users" per-page>
                    <x-slot:heading>
                        <x-th label="Id" />
                        <x-th label="Name" />
                        <x-th label="Email" />
                    </x-slot:heading>

                    @foreach ($users as $user)
                        <x-tr>
                            <x-td :label="$user->id" />
                            <x-td :label="$user->name" />
                            <x-td :label="$user->email" />
                        </x-tr>
                    @endforeach
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="With sorting" no-render>
        @verbatim('docs')
                @php
                    // Include `WithTcTable` trait
                    // use Developermithu\Tallcraftui\Traits\WithTcTable;

                    $users = App\Models\User::query()
                            ->tap(fn($query) => $this->tcApplySorting($query))
                            ->get();
                @endphp
                
                <x-table>
                    <x-slot:heading>
                        <x-th label="Id" sortable :$sortCol :$sortAsc />
                        <x-th label="Name" sortable :$sortCol :$sortAsc />
                    </x-slot:heading>
                </x-table>
        @endverbatim
    </x-code-block>

    <x-code-block title="Without loading spinner" no-render>
        @slot('description')
            You can disable the <strong>loading spinner</strong> by using the <code>no-loading</code> prop. And if you want to disable only the <strong>spinner</strong>, you can use the <code>no-spinner</code> prop.
        @endslot
        
        @verbatim('docs')
                <x-table no-loading />
                <x-table no-spinner />
        @endverbatim
    </x-code-block>

</div>
