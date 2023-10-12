<?php

namespace App\Exports;

use App\Models\Supply;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupplyExport implements FromCollection, WithHeadings
{
    private $start_date;
    private $end_date;


    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        return Supply::whereBetween('created_at', [$this->start_date, $this->end_date])->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'quantity_needs',
            'initial_price',
            'start_date',
            'end_date',
            'status',
            'created_at',
            'updated_at',
            'deleted_at',
            'product_id',
        ];
    }
}
