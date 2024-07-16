<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Transaction;
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
    public $month;


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
        $this->month = $this->invoice->month;
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

        if ($status == 'paid') {
            Transaction::create([
                'date' => $this->date,
                'description' => 'Pembayaran Tagihan Bulan ' . $this->month . ' dari ' . $this->clientName,
                'category' => 'Pendapatan',
                'amount' => $this->amount,
            ]);
        }

        session()->flash('message', 'Data tagihan telah diperbarui.');

        return redirect()->route('tagihan.index');
    }
}
