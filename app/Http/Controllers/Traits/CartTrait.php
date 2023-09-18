<?php

namespace App\Http\Controllers\traits;


use App\Models\Cart;
use App\Models\Selling;
use App\Models\SellingDetail;
use Illuminate\Support\Str;

trait CartTrait
{
    public function appending($user, $product, $quantity = 1): bool
    {
        $response = Cart::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => $quantity,
        ]);

        return (bool)$response;
    }

    public function changing($cart, $quantity, $delete = false): bool
    {
        if (!$delete) {
            $response = $cart->update([
                'quantity' => $quantity,
            ]);
        } else {
            $response = $cart->delete();
        }

        return (bool)$response;
    }

    public function toSelling($user)
    {
        $cart = Cart::with('product')
            ->where('user_id', $user->id)->get();

        $create = [
            'batch_code' => Str::random(10),
            'notes' => null,
            'additional_cost' => 0,
            'price_discounts' => 0,
            'customer_id' => $user->id,
            'status' => 'waiting_payment',
            'selling_transaction_number' => 'INV-' . date('YmdHis'),
        ];

        $createdSellingDetails = null;
        foreach ($cart as $item) {
            if (!isset($create['grand_total'])) {
                $create['grand_total'] = $item->product->selling_price;
            } else {
                $create['grand_total'] += $item->product->selling_price;
            }

            $sellingDetails = SellingDetail::create([
                'subtotal' => $item->product->price,
                'quantity' => $item->quantity,
                'product_id' => $item->product_id,
            ]);

            $createdSellingDetails[] = $sellingDetails->id;
        }

        $create['rounding_cost'] = $create['grand_total'];

        $selling = Selling::create($create);
        if ($selling) {
            $selling->selling_details()->sync($createdSellingDetails);

            return true;
        }

        return false;
    }
}
