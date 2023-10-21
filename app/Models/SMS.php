<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SMS extends Model
{
    protected $table = 'public_sms';
    use HasFactory,SoftDeletes;

    protected $guarded = ['id','created_at','updated_at'];
}
