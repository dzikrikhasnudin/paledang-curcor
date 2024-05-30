<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $clients = Client::all()->sortBy('name');
        return view('tagihan.create', compact('clients'));
    }
}
