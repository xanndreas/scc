<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchasing extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'purchasings';

    public const STATUS_SELECT = [

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
        'supplier_id',
        'status',
        'purchasing_transaction_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function purchasing_details()
    {
        return $this->belongsToMany(PurchasingDetail::class);
    }
}
