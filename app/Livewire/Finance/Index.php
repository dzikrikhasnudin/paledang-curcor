<?php

namespace App\Livewire\Finance;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('keuangan.index');
    }
}
