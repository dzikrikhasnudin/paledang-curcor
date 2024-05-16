<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]

    public function render()
    {
        $clients = Client::latest();
        return view('pelanggan.index', [
            'clients' => $clients->paginate(8)
        ]);
    }
}
