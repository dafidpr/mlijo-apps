<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class DiscountProductDetail extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function discountProduct()
    {
        return $this->belongsTo(DiscountProduct::class);
    }

    public function productVariantDetail()
    {
        return $this->belongsTo(ProductVariantDetail::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
