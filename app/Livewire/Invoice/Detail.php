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
        $this->date = $this->invoice->created_at;
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

        session()->flash('message', 'Data tagihan telah diperbarui.');

        return redirect()->route('tagihan.index');
    }
}
