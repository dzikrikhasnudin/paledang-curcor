<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Image extends ModalComponent
{
    public Transaction $transaction;

    public function render()
    {
        return view('keuangan.image');
    }
}
