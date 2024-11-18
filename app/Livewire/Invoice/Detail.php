<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use App\Models\Transaction;
use LivewireUI\Modal\ModalComponent;

class Detail extends ModalComponent
{
    public Payment $invoice;

    public $date;


    public function mount()
    {
        // $this->date = $this->invoice->created_at;
        $this->date = now();
    }

    public function render()
    {
        return view('tagihan.detail');
    }

    public function updateStatus($status)
    {

        $this->invoice->update([
            'status' => $status
        ]);


        if ($status == 'paid') {
            Transaction::create([
                'date' => $this->date,
                'description' => 'Pembayaran Tagihan Bulan ' . $this->invoice->month . ' dari ' . $this->invoice->client->name,
                'category' => 'Pendapatan',
                'amount' => $this->invoice->amount,
            ]);
        }

        session()->flash('message', 'Data tagihan telah diperbarui.');

        return redirect()->route('tagihan.index');
    }
}
