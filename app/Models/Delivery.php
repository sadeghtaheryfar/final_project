<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public function order()
    {
        return $this->hasOne(order::class);
    }



}
