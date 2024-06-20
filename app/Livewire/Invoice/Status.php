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
    public $date;
    public $status;
    public $image;


    public function mount($id)
    {
        $payment = Payment::find($id);
        $this->clientName = $payment->client->name;
        $this->clientAddress = $payment->client->address;
        $this->currentMeter = $payment->client->current_meter;
        $this->usage = $payment->usage;
        $this->amount = $payment->amount;
        $this->date = $payment->created_at;
        $this->status = $payment->status;
        $this->image = $payment->image;

    }
    public function render()
    {
        // dd($this->image);
        return view('tagihan.status');
    }
}
