<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Seller extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function sellerCategory()
    {
        return $this->hasMany(SellerCategory::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable_type');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function sellerNote()
    {
        return $this->hasMany(SellerNote::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
