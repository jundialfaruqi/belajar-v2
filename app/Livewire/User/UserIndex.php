<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Crypt; // Tambahkan ini
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    #[Title('Manajemen User')]

    public $title = 'Manajemen User';

    #[Url()]
    protected $paginationTheme = 'bootstrap';

    public $name, $email, $password;
    public $isEdit = false;
    public $showForm = false;
    public $showTable = true;

    #[Url(as: 'edit')]
    public $editId = null;

    public function mount()
    {
        if ($this->editId) {
            try {
                $decryptedId = Crypt::decrypt($this->editId);
                $this->edit($decryptedId);
            } catch (\Exception $e) {
                // Handle invalid encrypted ID, misalnya redirect atau error
                session()->flash('error', 'ID tidak valid.');
                $this->cancelOrResetInput();
            }
        }
    }

    public function render()
    {
        $users = User::select('id', 'name', 'email')->paginate(10);
        return view('livewire.user.user-index', [
            'users' => $users,
        ]);
    }

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'name.required' => 'Nama wajib diisi.',
        'name.min' => 'Nama minimal 3 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan, silakan pilih yang lain.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 6 karakter.',
    ];

    public function create()
    {
        $this->showForm = true;
        $this->showTable = false;
    }

    public function cancelOrResetInput()
    {
        $this->reset(['name', 'email', 'password', 'isEdit', 'showForm', 'editId']);
        $this->resetErrorBag();
        $this->showTable = true;

        return $this->redirect(route('user.index'), navigate: true);
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Data User Berhasil Disimpan');
        $this->cancelOrResetInput();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->isEdit = true;
        $this->showForm = true;
        $this->showTable = false;

        $this->editId = Crypt::encrypt($id); // Enkrip ID untuk URL
    }

    public function update()
    {
        $decryptedId = Crypt::decrypt($this->editId); // Dekrip dulu

        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $decryptedId,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($decryptedId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        session()->flash('success', 'User berhasil diupdate');
        $this->cancelOrResetInput();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'User berhasil dihapus');
    }
}
