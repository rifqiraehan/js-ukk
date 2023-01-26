<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;
    public $search;
    public $roleFilter;

    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];

    // fix Laravel Livewire Searching Issue on Page >1
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.list-users', [
            'users' => User::when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereHas('role', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })->when($this->roleFilter, function ($query) {
                $query->whereHas('role', function ($query) {
                    $query->where('name', 'like', '%' . $this->roleFilter . '%');
                });
            })->orderBy('role_id')
            
            // exclude users with role_id == 1
            ->whereHas('role', function ($query) {
                $query->where('id', '!=', 1);
            })
            ->paginate(5),
        ]);
    }
}
