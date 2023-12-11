<?php

namespace App\Http\Controllers\traits;


use App\Models\Cart;
use App\Models\DiscountSelling;
use App\Models\Product;
use App\Models\Selling;
use App\Models\SellingDetail;
use Illuminate\Support\Str;

trait CartTrait
{
    public function appending_cart($user, $product, $quantity = 1): bool
    {
        if ($product->stocks < $quantity) {
            return false;
        }

        $response = Cart::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => $quantity,
        ]);

        return (bool)$response;
    }

    public function changing_cart($cart, $delete = false, $quantity = 0): bool
    {
        $cart->load('product');
        if ($cart->product->stocks < $quantity) {
            return false;
        }

        if (!$delete) {
            $response = $cart->update([
                'quantity' => $quantity,
            ]);
        } else {
            $response = $cart->delete();
        }

        return (bool)$response;
    }

    public function toSelling($user, $discount = null)
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
            'grand_total' => 0,
            'selling_transaction_number' => 'INV-' . date('YmdHis'),
        ];

        $createdSellingDetails = null;
        foreach ($cart as $item) {
            if ($item->product->stocks < $item->quantity) {
                continue;
            }

            $create['grand_total'] += ($item->product->price_sell * $item->quantity);
            $sellingDetails = SellingDetail::create([
                'subtotal' => $item->product->price_sell,
                'quantity' => $item->quantity,
                'product_id' => $item->product_id,
            ]);

            $createdSellingDetails[] = $sellingDetails->id;
        }

        // has discount
        if ($discount) {
            $discount_value = 0;
            $discount_used = DiscountSelling::with('selling')->where('discount_id')
                ->count();

            if ($create['grand_total'] > $discount->min_buy_value && $discount_used <= $discount->quota) {
                $discount_value = ($create['grand_total'] * ($discount->percentage / 100));
                if ($discount_value >= $discount->max_discount_value) {
                    $discount_value = $discount->max_discount_value;
                }
            }

            $create['grand_total'] = $create['grand_total'] - $discount_value;
            $create['price_discounts'] = $discount_value;
        }

        $create['rounding_cost'] = $create['grand_total'];
        $selling = Selling::create($create);

        if ($selling) {
            if ($discount) {
                DiscountSelling::create([
                    'discount_id' => $discount->id,
                    'selling_id' => $selling->id
                ]);
            }

            $selling->selling_details()->sync($createdSellingDetails);

            foreach ($cart as $item) {
                $item->delete();
            }

            return true;
        }

        return false;
    }
}
