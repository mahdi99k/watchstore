<?php

namespace App\Http\Livewire\Admin;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{

    use WithPagination; //show class

    protected $paginationTheme = 'bootstrap';  //show pagination in livewire
    public $search;

    public function render()
    {
        $roles = Role::query()
            ->where('name', 'like', '%' . $this->search . '%')  //database -> name
            ->paginate(10);
        return view('livewire.admin.roles', compact('roles'));
    }

}
