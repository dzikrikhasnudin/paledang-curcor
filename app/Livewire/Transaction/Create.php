<?php

namespace App\Livewire\Transaction;

use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $category;
    public $description;
    public $image;
    public $amount;
    public $date;

    public function render()
    {
        return view('keuangan.create');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
}
