<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Transaction;

class Dashboard extends Component
{
    public $invoices;
    public $incomes;
    public $expenses;

    public function mount()
    {
        $this->invoices = Payment::where('status', 'unpaid')->latest()->take(5)->get();
        $this->incomes = Transaction::income()->take(6)->get();
        $this->expenses = Transaction::expense()->take(6)->get();
    }
    public function render()
    {
        // dd($this->invoices);
        return view('dashboard.index');
    }
}
