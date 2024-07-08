<?php

namespace App\Livewire\Transaction;

use Livewire\Component;

class Create extends Component
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
}
