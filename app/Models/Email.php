<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    protected $table = 'public_email';
    use HasFactory,SoftDeletes;

    protected $guarded = ['id','created_at','updated_at'];
}
