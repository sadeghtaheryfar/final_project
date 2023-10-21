<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotifacationController extends Controller
{

    public function index(){
        $notifications = Notifications::all()->where('notifiable_id',Auth::user()->id);
        return view('admin.notifacation.index', compact('notifications'));
    }
}
