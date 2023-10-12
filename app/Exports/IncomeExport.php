<?php

namespace App\Exports;

use App\Models\Ledger;
use App\Models\Supply;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncomeExport implements FromCollection, WithHeadings
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
        return Ledger::whereBetween('created_at', [$this->start_date, $this->end_date])->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'notes',
            'value',
            'model_id',
            'model_type',
            'transaction_batch',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}
