<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    #[Title('Manajemen User')]
    protected $paginationTheme = 'bootstrap';
    public $paginate = '10';

    public function render()
    {
        $users = User::select('id', 'name', 'email')->paginate(10);
        return view('livewire.user.user-index', [
            'users' => $users,
            'title' => 'Manajemen User',
        ]);
    }
}
