<?php

namespace App\Models;

use App\Models\User;
use App\Models\TicketAdmins;
use App\Models\TicketCategory;
use App\Models\TicketPriorities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id','created_at','updated_at','deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(TicketAdmins::class,'reference_id');
    }

    public function priority()
    {
        return $this->belongsTo(TicketPriorities::class);
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function file()
    {
        return $this->hasOne(TicketFiles::class,'ticket_id');
    }
}
