<?php

namespace App\Livewire\Invoice;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('tagihan.index');
    }
}
