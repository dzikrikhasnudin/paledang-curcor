<?php

namespace App\Livewire\Invoice;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.app')]

    public $paginate = 8;
    public $month;

    protected $queryString = ['bulan'];

    public function mount()
    {
        $this->month = request()->query('bulan', $this->month);
    }
    public function render()
    {


        return view('tagihan.index', [
            'invoices' => $this->month == null ?
                Payment::latest()->paginate($this->paginate) :
                Payment::where('month', 'like', '%' . $this->month . '%')->paginate($this->paginate)
        ]);
    }
}
