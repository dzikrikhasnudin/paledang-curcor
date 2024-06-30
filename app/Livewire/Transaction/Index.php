<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public $incomes;
    public $expenses;
    public $balance;

    public function mount()
    {
        $this->incomes = Transaction::income()->get();
        $this->expenses = Transaction::expense()->get();
        $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
    }


    public function render()
    {
        $transactions = Transaction::latest('date')->get();
        return view('keuangan.index', compact('transactions'));
    }
}
