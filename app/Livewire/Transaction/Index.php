<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $incomes;
    public $expenses;
    public $balance;
    public $cari;
    public $month;

    protected $queryString = ['bulan'];

    public function mount()
    {
        $this->month = request()->query('bulan', $this->month);
    }

    public function render()
    {
        $this->updateBalances();

        if ($this->month != null) {
            $transactions = Transaction::latest('date')->whereMonth('date', $this->month)->paginate($this->paginate);
        } else {
            $transactions = Transaction::latest('date')->paginate($this->paginate);
        }

        return view('keuangan.index', compact('transactions'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (Storage::exists('public', $transaction->image)) {
            Storage::delete('public/' . $transaction->image);
        }

        $transaction->delete();
        $this->dispatch('transaction-deleted', $transaction);
    }

    #[On('transaction-deleted')]
    public function updateBalances()
    {
        if ($this->month != null) {
            $this->incomes = Transaction::income()->whereMonth('date', $this->month)->get();
            $this->expenses = Transaction::expense()->whereMonth('date', $this->month)->get();
            $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
        } else {
            $this->incomes = Transaction::income()->get();
            $this->expenses = Transaction::expense()->get();
            $this->balance = $this->incomes->sum('amount') - $this->expenses->sum('amount');
        }
    }
}
