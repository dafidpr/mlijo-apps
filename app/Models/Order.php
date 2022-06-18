<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Order extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderAddress()
    {
        return $this->hasOne(OrderAddress::class);
    }

    public function orderTracking()
    {
        return $this->hasMany(OrderTracking::class);
    }
}
