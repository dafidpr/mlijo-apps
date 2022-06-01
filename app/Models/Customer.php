<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Customer extends Model
{
    use HasFactory;
    use HasHashid;
    use HashidRouting;
    protected $appends = ['hashid'];
    protected $guarded = [];

    public function user()
    {
        return $this->morphOne(User::class, 'userable_type');
    }
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
