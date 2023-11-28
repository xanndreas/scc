<?php

namespace App\Http\Controllers\traits;

use Carbon\Carbon;
use App\Models\Ledger;
use Illuminate\Support\Str;

trait LedgerTrait
{
    public function appending_ledger($value, $model, $rel_number, $notes = null): bool
    {
        $ledgers = Ledger::create([
            'notes' => $notes ?? "",
            'value' => $value,
            'model_id' => $model->id,
            'model_type' => get_class($model),
            'transaction_batch' => $rel_number
        ]);

        return (bool)$ledgers;
    }

    public function log_ledger($range) {
        if ($range != null) {
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

            return Ledger::whereBetween('created_at', [$from, $to])
                ->get();
        }

        return Ledger::all();
    }

    public function debit($range)
    {
        if ($range != null) {
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

            return Ledger::where('model_type', 'App\Models\Purchasing')
                ->whereBetween('created_at', [$from, $to])
                ->sum('value');
        }

        return Ledger::where('model_type', 'App\Models\Purchasing')
            ->sum('value');
    }

    public function credit($range)
    {
        if ($range != null) {
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

            return Ledger::where('model_type', 'App\Models\Selling')
                ->whereBetween('created_at', [$from, $to])
                ->sum('value');
        }

        return Ledger::where('model_type', 'App\Models\Selling')
            ->sum('value');
    }

    public function summaries($range): float
    {
        return (float)($this->credit($range) - $this->debit($range));
    }
}
