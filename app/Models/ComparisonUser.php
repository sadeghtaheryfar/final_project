<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComparisonUser extends Model
{
    protected $table = 'comparison_users';
    use HasFactory;

    protected $guarded = ['id'];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
