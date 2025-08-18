<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserIndex extends Component
{
    #[Title('Manajemen User')]
    public function render()
    {
        $users = User::select('id', 'name', 'email')->get();
        return view('livewire.user.user-index', [
            'users' => $users,
            'title' => 'Manajemen User',
        ]);
    }
}
