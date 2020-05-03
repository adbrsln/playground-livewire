<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\User;

class Record extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.home.record');
    }

    public function editRecord()
    {
        $this->emitUp('userEdited', $this->user->id);
    }
    public function deleteRecord()
    {
        $this->emitUp('userDeleted', $this->user->id);
    }
}
