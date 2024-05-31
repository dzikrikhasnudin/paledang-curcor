<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use LivewireUI\Modal\ModalComponent;

class Detail extends ModalComponent
{
    public Payment $invoice;

    public $clientName;
    public $clientAddress;
    public $status;

    public function mount()
    {
        $this->clientName = $this->invoice->client->name;
        $this->clientAddress = $this->invoice->client->address;
        $this->status = $this->invoice->status;


    }
    public function render()
    {
        return view('tagihan.detail');
    }
}
