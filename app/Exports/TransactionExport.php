<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements FromCollection, WithMapping, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $month;

    function __construct($month)
    {
        $this->month = $month;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaction::oldest('date')->whereMonth('date', $this->month)->get();
    }


    public function map($transaction): array
    {
        switch ($transaction->category) {
            case 'Pendapatan':
                $income = $transaction->amount;
                $expense = '';
                break;
            case 'Pengeluaran':
                $income = '';
                $expense = $transaction->amount;
                break;
        }


        return [
            $transaction->date->translatedFormat('d F Y'),
            $transaction->description,
            $income,
            $expense,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Keterangan',
            'Pendapatan',
            'Pengeluaran',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }
}
