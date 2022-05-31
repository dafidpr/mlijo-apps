<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Product extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function discountProduct()
    {
        return $this->hasMany(DiscountProduct::class);
    }

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }
}
