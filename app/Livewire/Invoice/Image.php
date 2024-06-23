<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use LivewireUI\Modal\ModalComponent;

class Image extends ModalComponent
{
    public Payment $invoice;

    public function render()
    {
        return view('tagihan.image');
    }
}
