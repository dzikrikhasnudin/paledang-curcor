<?php

namespace App\Livewire\Client;

use App\Models\Client;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $name;
    public $address;
    public $start_meter = 0;

    public function render()
    {
        return view('pelanggan.create');
    }

    public function save()
    {

        $validated = $this->validate([
            'name' => 'required|min:3|string',
            'address' => 'required|string',
            'start_meter' => 'required|numeric',
        ]);

        Client::create($validated);

        session()->flash('message', 'Data pelanggan telah ditambahkan.');

        return redirect()->route('pelanggan.index');
    }
}
