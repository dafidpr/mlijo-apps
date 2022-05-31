<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class ProductVariant extends Model
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

    public function productVariantDetail()
    {
        return $this->hasMany(ProductVariantDetail::class);
    }
}
