<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellingDetail extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'selling_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subtotal',
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

    public function sellingDetailSellings()
    {
        return $this->belongsToMany(Selling::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
