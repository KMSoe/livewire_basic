<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3')]
    public $name = "";

    #[Rule('required|email|unique:users')]
    public $email = "";

    #[Rule('required|min:6')]
    public $password = "";

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image = "";

    public function create()
    {
        $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        $user = User::create($validated);

        $this->reset(['name', 'email', 'password']);

        session()->flash('success', 'User created successfully');

        $this->dispatch('user-created', $user);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
