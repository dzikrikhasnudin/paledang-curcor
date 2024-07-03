<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    public $paginate = 20;
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
        $transactions = Transaction::latest('date')->paginate($this->paginate);
        return view('keuangan.index', compact('transactions'));
    }
}
