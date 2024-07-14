<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    public $paginate = 20;
    public $incomes;
    public $expenses;
    public $balance;
    public $cari;
    public $month;

    public function render()
    {
        $this->updateBalances();

        $transactions = Transaction::latest('date')->paginate($this->paginate);
        return view('keuangan.index', compact('transactions'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        $this->dispatch('transaction-deleted', $transaction);
    }

    #[On('transaction-deleted')]
    public function updateBalances()
    {
        $this->incomes = Transaction::income()->get();
        $this->expenses = Transaction::expense()->get();
        $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
    }
}
