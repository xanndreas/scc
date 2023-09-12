<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'offers';

    public const STATUS_SELECT = [

    ];

    protected $dates = [
        'offering_expired_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'supplier_id',
        'status',
        'grand_total',
        'offering_expired_date',
        'offering_number',
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

    public function offer_details()
    {
        return $this->belongsToMany(OfferDetail::class);
    }

    public function getOfferingExpiredDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOfferingExpiredDateAttribute($value)
    {
        $this->attributes['offering_expired_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}