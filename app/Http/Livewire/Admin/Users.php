<?php

namespace App\Http\Livewire\Admin;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination; //show class

    protected $paginationTheme = 'bootstrap';  //show pagination in livewire
    public $search;

    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')  //database -> name
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.admin.users', compact('users'));
    }

    public function changeUserStatus($id)
    {
        $user = User::query()->find($id);
        if ($user->status == UserStatus::Active->value) {  /* if active -> change -> inactive ... اگر فعال بود تغییر بده به غیر فعال و برعکس  */
            $user->update([
                'status' => UserStatus::InActive->value
            ]);
        } else {
            $user->update([
                'status' => UserStatus::Active->value
            ]);
        }

    }

}
