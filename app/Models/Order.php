<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function payment()
    {
        return $this->belongsTo(OfflinePayment::class);
    }

}
