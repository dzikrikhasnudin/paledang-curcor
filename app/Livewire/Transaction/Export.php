<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Export extends ModalComponent
{
    public $month;

    public function render()
    {
        return view('keuangan.export');
    }

    public function export()
    {
        $this->dispatch('closeModal');

        return redirect()->route('cetak.transaksi', $this->month);
    }
}
