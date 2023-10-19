<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public function updatedList($user)
    {
        dd($user);
    }

    public function placeholder()
    {
        return view('livewire.placeholder');
    }

    #[On('user-created')]
    public function render()
    {
        sleep(3);
        return view('livewire.user-list', [
            'users' => User::latest()->paginate(10),
        ]);
    }
}
