<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferDetail extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'offer_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'quantity',
        'product_id',
        'price_offer',
        'price_deal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function offerDetailOffers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
