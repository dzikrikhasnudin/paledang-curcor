<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $clientId;
    public $price = 2000;
    public $month;
    public $meter;
    public $image;


    public function render()
    {
        $clients = Client::all()->sortBy('name');
        return view('tagihan.create', compact('clients'));
    }

    public function save()
    {
        $previousMonth = Payment::where('client_id', $this->clientId)->latest()->first();

        $client = Client::find($this->clientId);
        if ($previousMonth == null)
        {
            $previousMeter = $client->start_meter;
        } else {
            $previousMeter = $previousMonth->total_meter;
        }

        $usage = $this->meter - $previousMeter;

        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();

            $filePath = 'Meteran-' . date('Y') . '/' . $this->month;
            $fileName = str_replace(' ', '-', $client->name) . '-' . str_replace(' ', '-', $client->address) . '.' . $extension;

            $imagePath = $this->image->storeAs($filePath, $fileName, 'public');
        } else {
            $imagePath = null;
        };

        $payment = Payment::create([
            'client_id' => $this->clientId,
            'month' => $this->month,
            'total_meter' => $this->meter,
            'usage' => $usage,
            'amount' => $usage * $this->price,
            'image' => $imagePath
        ]);

        $client->update([
            'current_meter' => $this->meter
        ]);

        return redirect()->route('tagihan.status', $payment->id);
    }

}
