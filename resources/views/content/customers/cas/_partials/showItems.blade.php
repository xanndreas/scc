<div class="row my-2">
    <div class="form-group">

        <table class="table table-striped mb-5">
            <tbody>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.id') }}
                </th>
                <td>
                    {{ $selling->id }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.batch_code') }}
                </th>
                <td>
                    {{ $selling->batch_code }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.grand_total') }}
                </th>
                <td>
                    {{ $selling->grand_total }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.rounding_cost') }}
                </th>
                <td>
                    {{ $selling->rounding_cost }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.additional_cost') }}
                </th>
                <td>
                    {{ $selling->additional_cost }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.price_discounts') }}
                </th>
                <td>
                    {{ $selling->price_discounts }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.customer') }}
                </th>
                <td>
                    {{ $selling->customer->name ?? '' }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.status') }}
                </th>
                <td>
                    {{ $selling->status ?? '' }}
                </td>
            </tr>
            <tr>
                <th class="w-25">
                    {{ trans('cruds.selling.fields.selling_transaction_number') }}
                </th>
                <td>
                    {{ $selling->selling_transaction_number }}
                </td>
            </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <b> Products</b>
        </div>

        <table class="table table-hover table-striped mb-3">
            <tbody>
            <tr>
                <th class="w-25">
                    Quantity
                </th>
                <th class="w-50">
                    Product
                </th>
                <th>
                    Subtotal
                </th>
            </tr>

            <input type="hidden" name="action_type">
            @php
                $reorderSellingDetail = null;
                foreach ($selling->selling_details as $item) {
                    if (!isset($reorderSellingDetail[$item->product->id])) {
                        $reorderSellingDetail[$item->product->id] = [
                            'product_quantity' => $item->quantity,
                            'product_name' => $item->product->name,
                            'product_subtotal' => $item->subtotal,
                        ];
                    } else {
                        $reorderSellingDetail[$item->product->id]['product_quantity'] += $item->quantity;
                        $reorderSellingDetail[$item->product->id]['product_subtotal'] += $item->subtotal;
                    }
                }
            @endphp

            @foreach($reorderSellingDetail as $index => $items )
                <tr>
                    <td>
                        {{ $items['product_quantity']}}
                    </td>
                    <td>
                        {{ $items['product_name']}}
                    </td>
                    <td>
                        {{ $items['product_subtotal']}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
