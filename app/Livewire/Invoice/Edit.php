<?php

namespace App\Livewire\Invoice;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $invoice;
    public $clientId;
    public $meter;
    public $price = 2000;

    public $amount;
    public $date;
    public $status;
    public $month;
    public $newImage;
    public $image;

    public function mount($id)
    {
        $this->invoice = Payment::find($id);

        $this->clientId = $this->invoice->client_id;
        $this->meter = $this->invoice->total_meter;
        $this->month = $this->invoice->month;
        $this->image = $this->invoice->image;
    }

    public function render()
    {
        $clients = Client::all()->sortBy('name');

        return view('tagihan.edit', compact('clients'));
    }

    public function update()
    {
        $invoices = Payment::where('client_id', $this->clientId)->latest()->get();

        $previous = $invoices->where('id', '<', $this->invoice->id)->first();
        if ($previous != null) {
            $previousMeter = $previous->total_meter;
            $usage = $this->meter - $previousMeter;
        } else {
            $previousMeter = $this->invoice->client->start_meter;
        }

        $usage = $this->meter - $previousMeter;

        if ($this->newImage) {

            if (Storage::fileExists('public/' . $this->image)) {
                Storage::delete('public/' . $this->image);
            };

            $extension = $this->newImage->getClientOriginalExtension();

            $filePath = 'Meteran-' . date('Y') . '/' . $this->month;
            $fileName = str_replace(' ', '-', $this->invoice->client->name) . '-' . str_replace(' ', '-', $this->invoice->client->address) . '.' . $extension;

            $imagePath = $this->newImage->storeAs($filePath, $fileName, 'public');
        } else {
            if ($this->image) {
                $imagePath = $this->image;
            } else {
                $imagePath = null;
            }
        };

        $this->invoice->update([
            'client_id' => $this->clientId,
            'month' => $this->month,
            'total_meter' => $this->meter,
            'usage' => $usage,
            'amount' => $usage * $this->price,
            'image' => $imagePath
        ]);

        session()->flash('message', 'Data tagihan telah diperbarui');

        return redirect()->route('tagihan.index');
    }
}
