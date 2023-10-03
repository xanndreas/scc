<?php

namespace App\Models;

use App\Http\Controllers\traits\InventoryTrait;
use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory, InventoryTrait;

    public $table = 'products';

    public const TYPE_SELECT = [
        'type' => 'Type',
    ];

    protected $appends = [
        'featured_image',
        'stocks'
    ];

    public const PACKAGING_UNIT_SELECT = [
        'pcs' => 'Pcs',
        'kg' => 'Kg',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'category_id',
        'stock_minimum',
        'price_buy',
        'price_sell',
        'packaging_unit',
        'slug',
        'product_code',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function productPurchasingDetails()
    {
        return $this->hasMany(PurchasingDetail::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getStocksAttribute()
    {
        return $this->stocks($this);
    }

    public function getFeaturedImageAttribute()
    {
        $files = $this->getMedia('featured_image');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
