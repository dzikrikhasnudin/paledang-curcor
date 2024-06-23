<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use LivewireUI\Modal\ModalComponent;

class Detail extends ModalComponent
{
    public Payment $invoice;

    public $clientName;
    public $clientAddress;
    public $currentMeter;
    public $usage;
    public $amount;
    public $date;
    public $status;
    public $month;

    public function mount()
    {
        $this->clientName = $this->invoice->client->name;
        $this->clientAddress = $this->invoice->client->address;
        $this->status = $this->invoice->status;
        $this->currentMeter = $this->invoice->client->current_meter;
        $this->usage = $this->invoice->usage;
        $this->amount = $this->invoice->amount;
        $this->date = $this->invoice->created_at;
        $this->status = $this->invoice->status;
    }
    public function render()
    {
        return view('tagihan.detail');
    }
}
