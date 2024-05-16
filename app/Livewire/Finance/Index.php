<?php

namespace App\Livewire\Finance;

use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('keuangan.index');
    }
}
