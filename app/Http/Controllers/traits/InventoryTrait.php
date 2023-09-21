<?php

namespace App\Http\Controllers\traits;


use App\Models\Inventory;
use Carbon\Carbon;

trait InventoryTrait
{
    public function appending_invent($quantity, $product, $model, $types): bool
    {
        $inventory = Inventory::create([
            'types' => $types,
            'quantity' => $quantity,
            'product_id' => $product->id,
            'model_key' => $model->id,
            'model_name' => sprintf('%s#%s', get_class($model), $model->id) ?? null,
        ]);

        return (bool)$inventory;
    }

    public function log_invent($product, $type, $range = null)
    {
        $logInvent = Inventory::with('product');
        if ($range != null) {
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $range[0]);
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $range[1]);

            $logInvent->whereBetween('created_at', [$from, $to]);
            if ($product != null) {
                $logInvent->where('product_id', $product->id);
            }

            if ($type != null) {
                $logInvent->where('types', $type);
            }

            return $logInvent->get();
        }

        return $logInvent->get();
    }

    public function stocks($product): bool|int
    {
        if ($product == null) {
            return false;
        }

        $inventProduct = Inventory::with('product')
            ->where('product_id', $product->id);

        $stock_in = $inventProduct->where('types', 'in')
            ->where('product_id', $product->id)
            ->sum('quantity');

        $stock_out = $inventProduct->where('types', 'out')
            ->where('product_id', $product->id)
            ->sum('quantity');

        return (int)($stock_in - $stock_out);
    }
}
