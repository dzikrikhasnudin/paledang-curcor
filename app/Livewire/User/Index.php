<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }
}
