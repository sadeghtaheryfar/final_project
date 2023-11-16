<?php

namespace App\Models;

use App\Models\Permission;
use App\Tratis\Permissions\HasPermissionTrait;
use Laravel\Sanctum\HasApiTokens;
use Nagy\LaravelRating\Traits\CanRate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes , CanRate, SoftDeletes,HasPermissionTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'favorite' => 'array',
    ];


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function offlinePayment()
    {
        return $this->hasOne(OfflinePayment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
