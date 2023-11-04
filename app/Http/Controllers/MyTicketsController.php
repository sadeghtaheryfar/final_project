<?php

namespace App\Http\Controllers;

use App\Models\MyTickets;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMyTicketsRequest;
use App\Http\Requests\UpdateMyTicketsRequest;
use App\Models\TicketCategory;
use App\Models\TicketPriorities;
use App\Models\Tickets;

class MyTicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tickets = Tickets::where('ticket_id',null)->where('user_id',$user->id)->get();
        return view('profile.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TicketCategory::all();
        $priorities = TicketPriorities::all();
        return view('profile.ticket.create',compact('priorities','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMyTicketsRequest $request)
    {
        $inputs = $request->all();
        $user = Auth::user();
        $inputs['user_id'] = $user->id;
        Tickets::create($inputs);
        return redirect()->route('myTickets.index')->with('swal-success', 'تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $myTicket)
    {
        $user = Auth::user();
        $TicketsAnswear = Tickets::where("ticket_id",$myTicket->id)->get()->sortDesc();
        return view('profile.ticket.show',compact('myTicket','TicketsAnswear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyTickets $myTickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMyTicketsRequest $request, Tickets $myTicket)
    {
        $inputs = $request->all();
        $user = Auth::user();
        $inputs['subject'] = $myTicket->subject;
        $inputs['user_id'] = $user->id;
        $inputs['ticket_id'] = $myTicket->id;
        $inputs['category_id'] = $myTicket->category_id;
        $inputs['priority_id'] = $myTicket->priority_id;
        Tickets::create($inputs);
        $myTicket->status = $inputs['status'];
        $myTicket->update();
        return redirect()->route('myTickets.index')->with('swal-success', 'پاسخ تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyTickets $myTickets)
    {
        //
    }
}
