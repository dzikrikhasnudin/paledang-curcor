<?php

namespace App\Livewire\Client;


use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public Client $client;

    public $name;
    public $address;
    public $start_meter;

    public function mount()
    {
        $this->name = $this->client->name;
        $this->address = $this->client->address;
        $this->start_meter = $this->client->start_meter;
    }


    public function render()
    {
        return view('pelanggan.edit', [
            'client' => $this->client
        ]);
    }

    public function update()
    {

        $validated = $this->validate([
            'name' => 'required|min:3|string',
            'address' => 'required|string',
            'start_meter' => 'required|numeric',
        ]);

        $this->client->update($validated);

        session()->flash('message', 'Data pelanggan telah diperbarui.');

        return redirect()->route('pelanggan.index');
    }
}
