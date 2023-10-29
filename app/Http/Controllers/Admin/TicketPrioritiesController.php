<?php

namespace App\Http\Controllers\Admin;

use App\Models\TicketPriorities;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketPrioritiesRequest;
use App\Http\Requests\UpdateTicketPrioritiesRequest;

class TicketPrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TicketPriorities = TicketPriorities::all();
        return view('admin.TicketPriorities.index', compact('TicketPriorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.TicketPriorities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketPrioritiesRequest $request)
    {
        $inputs = $request->all();
        TicketPriorities::create($inputs);
        return redirect()->route('admin.tickets-priorities.index')->with('swal-success', 'الویت تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketPriorities $ticketPriorities)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ticketPriority)
    {
        //  این قسمت روت مدل بایندینگ نمی شد مجبور شدم .
        $ticketPriority = TicketPriorities::find($ticketPriority);
        return view('admin.TicketPriorities.edit', compact('ticketPriority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketPrioritiesRequest $request,$ticketPriority)
    {
        $inputs = $request->all();
        $ticketPriority = TicketPriorities::find($ticketPriority);
        $ticketPriority->update($inputs);
        return redirect()->route('admin.tickets-priorities.index')->with('swal-success', ' الویت تیکت شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticketPriority)
    {
        $ticketPriority = TicketPriorities::find($ticketPriority);
        $result = $ticketPriority->delete();
        return redirect()->route('admin.tickets-priorities.index')->with('swal-success', 'اولویت تیکت شما با موفقیت حذف شد');
    }
}
