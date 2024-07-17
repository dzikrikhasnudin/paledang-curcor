<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class InvoiceExport implements FromCollection, WithMapping, WithHeadings, WithStyles, ShouldAutoSize, WithCustomStartCell
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
        return Payment::where('month', $this->month)->get();
    }

    public function startCell(): string
    {
        return 'B1';
    }

    public function map($invoice): array
    {
        if ($invoice->status == 'paid') {
            $status = 'Lunas';
        } else {
            $status = 'Belum Lunas';
        }

        return [
            $invoice->client->name,
            $invoice->client->address,
            $invoice->amount,
            $status
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Alamat',
            'Jumlah Tagihan',
            'Status Pembayaran',
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
