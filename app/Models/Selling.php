<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Selling extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'sellings';

    public const STATUS_SELECT = [
        'waiting_payment' => 'Waiting Payment',
        'confirmed' => 'Order Confirmed',
        'on_process' => 'On Process',
        'done' => 'Done',
        'canceled' => 'Canceled'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'batch_code',
        'grand_total',
        'notes',
        'rounding_cost',
        'additional_cost',
        'price_discounts',
        'customer_id',
        'status',
        'selling_transaction_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function selling_details()
    {
        return $this->belongsToMany(SellingDetail::class);
    }
}
