<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class DataExport implements FromQuery, WithMapping, WithHeadings, WithColumnWidths, WithStyles
{
    use Exportable;

    public function query()
    {
        return Post::query();
    }

    public function map($data): array
    {
        return [
            $data->kode,
            $data->deskripsi,
            $data->l_deskripsi,
            $data->qty,
            $data->loc,
            $data->mrp,
            $data->ma,
            $data->rop,
            $data->mi,
            $data->price,
        ];
    }

    public function headings(): array
    {
        return [
            'Material code',
            'Old Description',
            'Long Text',
            'Qty',
            'Location',
            'Mrp Type',
            'Max',
            'Rop',
            'Safety stock',
            'Price'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 13.57,
            'B' => 84.43,
            'C' => 84.43,            
            'E' => 16.29,            
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


