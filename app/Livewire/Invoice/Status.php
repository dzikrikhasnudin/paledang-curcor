<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;

class Status extends Component
{
    public $invoice;
    public $clientName;
    public $clientAddress;
    public $totalMeter;
    public $usage;
    public $amount;
    public $date;
    public $status;
    public $image;


    public function mount($id)
    {
        $this->invoice = Payment::find($id);
        $this->clientName = $this->invoice->client->name;
        $this->clientAddress = $this->invoice->client->address;
        $this->totalMeter = $this->invoice->total_meter;
        $this->usage = $this->invoice->usage;
        $this->amount = $this->invoice->amount;
        $this->date = $this->invoice->created_at;
        $this->status = $this->invoice->status;
        $this->image = $this->invoice->image;
    }
    public function render()
    {
        // dd($this->image);
        return view('tagihan.status');
    }

    public function updateStatus($status)
    {
        $this->invoice->update([
            'status' => $status
        ]);

        session()->flash('message', 'Data tagihan telah diperbarui.');

        return redirect()->route('tagihan.index');
    }
}
