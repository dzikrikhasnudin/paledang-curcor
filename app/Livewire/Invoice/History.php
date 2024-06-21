<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use LivewireUI\Modal\ModalComponent;

class History extends ModalComponent
{
    public Client $client;

    public $invoices;

    public function mount()
    {
        $this->invoices = Payment::where('client_id', $this->client->id)->get();
    }

    public function render()
    {
        // dd($this->invoices);

        return view('tagihan.history');
    }
}
