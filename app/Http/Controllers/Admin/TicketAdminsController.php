<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\TicketAdmins;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketAdminsRequest;
use App\Http\Requests\UpdateTicketAdminsRequest;

class TicketAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TicketAdmins = TicketAdmins::all();
        return view('admin.TicketAdmins.index', compact('TicketAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.TicketAdmins.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketAdminsRequest $request)
    {
        $inputs = $request->all();
        $TicketAdmin = TicketAdmins::where("user_id", $request->user_id)->withTrashed()->first();
        if($TicketAdmin->deleted_at !== null) {
            $TicketAdmin->deleted_at = null;
            $TicketAdmin->update();
        }else if($TicketAdmin->deleted_at === null){
            if($TicketAdmin){
                return redirect()->route('admin.tickets-admins.index')->with('swal-error', 'این کاربر قبلا به عنوان ادمین تیکت انتخاب شده است . ');
                exit();
            }else{
                TicketAdmins::create($inputs);
            }
        };
        return redirect()->route('admin.tickets-admins.index')->with('swal-success', 'ادمین تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketAdmins $ticketAdmins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($TicketAdmin)
    {
        //  این قسمت روت مدل بایندینگ نمی شد مجبور شدم .
        $users = User::all();
        $TicketAdmin = TicketAdmins::find($TicketAdmin);
        return view('admin.TicketAdmins.edit', compact('TicketAdmin','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketAdminsRequest $request,$ticketAdmin)
    {
        $inputs = $request->all();
        $ticketAdmin = TicketAdmins::find($ticketAdmin);
        if($ticketAdmin->user_id === $inputs['user_id'])
        {
            $ticketAdmin->update($inputs);
        }else{
            return redirect()->route('admin.tickets-admins.index')->with('swal-error', 'این کاربر قبلا به عنوان ادمین تیکت انتخاب شده است . ');
            exit();
        }
        return redirect()->route('admin.tickets-admins.index')->with('swal-success', ' ادمین تیکت شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticketAdmin)
    {
        $ticketAdmin = TicketAdmins::find($ticketAdmin);
        $result = $ticketAdmin->delete();
        return redirect()->route('admin.tickets-admins.index')->with('swal-success', 'ادمین تیکت شما با موفقیت حذف شد');
    }
}
