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
    public function render()
    {

        return view('tagihan.index', [
            'invoices' => Payment::latest()->paginate($this->paginate)
        ]);
    }
}
