<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{

    public function render()
    {
        $transactions = Transaction::latest()->get();
        return view('keuangan.index', compact('transactions'));
    }
}
