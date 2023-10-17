<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Counter extends Component
{
    public $count    = 0;

    #[Rule('required|min:3')] 
    public $name     = "";

    #[Rule('required|email|unique:users')]
    public $email    = "";

    #[Rule('required|min:6')]
    public $password = "";

    public function createNewUser()
    {
        $validated = $this->validate();

        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.counter', [
            'users' => $users,
        ]);
    }
}
