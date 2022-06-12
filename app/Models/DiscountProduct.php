<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class DiscountProduct extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function productDiscountDetail()
    {
        return $this->hasMany(DiscountProductDetail::class);
    }
}
