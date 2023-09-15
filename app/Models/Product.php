<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rateable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes , Rateable;

    protected $guarded = ['id','status','created_at','updated_at','deleted_at','marketable','sold_number'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
