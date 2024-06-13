<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;

class Status extends Component
{
    public $clientName;
    public $clientAddress;
    public $currentMeter;
    public $usage;
    public $amount;


    public function mount($id)
    {
        $payment = Payment::find($id);
        $this->clientName = $payment->client->name;
        $this->clientAddress = $payment->client->address;
        $this->currentMeter = $payment->client->current_meter;
        $this->usage = $payment->usage;
        $this->amount = $payment->amount;

    }
    public function render()
    {
        return view('tagihan.status');
    }
}
