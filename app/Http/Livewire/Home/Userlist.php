<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\User;
use Livewire\WithPagination;

class Userlist extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = [
        'userAdded' => 'showUserAddedMessage',
        'userEdited' => 'showUserEditedMessage',
        'userDeleted' => 'delete'
    ];

    public function showUserAddedMessage()
    {
        session()->flash('status', 'User successfully created.');
    }
    public function showUserEditedMessage($id = null)
    {
        session()->flash('status', 'User successfully edited.' . $id);
    }
    public function showUserDeletedMessage()
    {
        session()->flash('status', 'User successfully deleted.');
    }

    public function delete($id = null)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        $this->showUserDeletedMessage();
        $this->reset();
    }
    public function mount()
    {
        $this->users = User::paginate(10);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.home.userlist', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }

    public function saveRecord()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|unique|email'
        ]);

        session()->flash('status', 'User successfully created.');
        $this->resetPage();
    }

    public function createUser()
    {
    }
}
