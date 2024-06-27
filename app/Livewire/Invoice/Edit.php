<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $clientId;
    public $clientName;
    public $clientAddress;
    public $currentMeter;
    public $usage;
    public $amount;
    public $date;
    public $status;
    public $month;
    public $newImage;
    public $image;

    public function mount($id)
    {
        $invoice = Payment::find($id);

        $this->clientId = $invoice->client_id;
        $this->month = $invoice->month;
        $this->currentMeter = $invoice->client->current_meter;
        $this->image = $invoice->image;
    }

    public function render()
    {
        $clients = Client::all()->sortBy('name');

        return view('tagihan.edit', compact('clients'));
    }
}
