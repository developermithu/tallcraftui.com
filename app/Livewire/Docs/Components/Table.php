<?php

namespace App\Livewire\Docs\Components;

use App\Models\User;
use Developermithu\Tallcraftui\Traits\WithTcTable;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Table - TallCraftUI Components')]
class Table extends Component
{
    use WithTcTable;

    public bool $is_active = false;

    public bool $email_verified_at = false;

    public function render()
    {
        $users = User::query()
            ->when($this->tcSearch, function ($query) {
                $query->where('name', 'LIKE', '%'.$this->tcSearch.'%');
            })
            ->when($this->is_active, function ($query) {
                $query->where('is_active', true);
            })
            ->when($this->email_verified_at, function ($query) {
                $query->whereNotNull('email_verified_at');
            })
            ->tap(fn ($query) => $this->tcApplySorting($query))
            ->paginate($this->tcPerPage);

        return view('livewire.docs.components.table', compact('users'));
    }
}
