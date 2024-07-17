<?php

namespace App\Livewire\Invoice;

use LivewireUI\Modal\ModalComponent;

class Export extends ModalComponent
{
    public $month;

    public function render()
    {
        return view('tagihan.export');
    }

    public function export()
    {
        $this->dispatch('closeModal');

        return redirect()->route('cetak.tagihan', $this->month);
    }
}
