<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;

#[Title('Edit Transaksi - Paledang Curcor')]
class Edit extends Component
{
    use WithFileUploads;

    public $transaction;

    public $date;
    public $category;
    public $description;
    public $amount;
    public $image;
    public $newImage;

    public function mount($id)
    {
        $this->transaction = Transaction::find($id);
        $this->date = $this->transaction->date;
        $this->category = $this->transaction->category;
        $this->description = $this->transaction->description;
        $this->amount = $this->transaction->amount;
        $this->image = $this->transaction->image;
    }

    public function render()
    {
        return view('keuangan.edit');
    }

    public function update()
    {
        if ($this->newImage) {

            $filePath = 'Transaksi';
            $fileName = time()  . '-' .  $this->newImage->getClientOriginalName();

            $imagePath = $this->newImage->storeAs($filePath, $fileName, 'public');
        } else {
            $imagePath = $this->image;
        };

        $this->transaction->update([
            'date' => $this->date,
            'description' => $this->description,
            'category' => $this->category,
            'amount' => $this->amount,
            'image' => $imagePath
        ]);

        session()->flash('message', 'Data transaksi telah diperbarui');

        return redirect()->route('keuangan.index');
    }
}
