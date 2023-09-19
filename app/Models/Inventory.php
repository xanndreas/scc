<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'inventories';

    public const TYPES_SELECT = [
        'in' => 'In',
        'out' => 'Out'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'model_key',
        'model_name',
        'types',
        'quantity',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
