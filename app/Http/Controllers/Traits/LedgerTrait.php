<?php

namespace App\Http\Controllers\traits;

use Carbon\Carbon;
use App\Models\Ledger;
use Illuminate\Support\Str;

trait LedgerTrait
{
    public function appending($value, $model, $notes = null): bool
    {
        $ledgers = Ledger::create([
            'notes' => $notes,
            'value' => $value,
            'model_id' => $model->id,
            'model_type' => get_class($model),
            'transaction_batch' => Str::random(10)
        ]);

        return (bool)$ledgers;
    }

    public function debit($range)
    {
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

        return Ledger::with()->where('model_type', 'App\Models\Purchasing')
            ->whereBetween('created_at', [$from, $to])
            ->sum('value');
    }

    public function credit($range)
    {
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

        return Ledger::with()->where('model_type', 'App\Models\Selling')
            ->whereBetween('created_at', [$from, $to])
            ->sum('value');
    }
}
