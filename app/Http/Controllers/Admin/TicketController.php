<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tickets;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function open()
    {
        $tickets = Tickets::where("ticket_id",null)->where("status",1)->get();
        return view('admin.ticket.index',compact('tickets'));
    }

    public function close()
    {
        $tickets = Tickets::where("ticket_id",null)->where("status",0)->get();
        return view('admin.ticket.index',compact('tickets'));
    }


    public function index()
    {
        $tickets = Tickets::where("ticket_id",null)->get();
        foreach($tickets as $ticket)
        {
            $ticket->seen = 1;
            $ticket->update();
        }
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $ticket)
    {
        $TicketsAnswear = Tickets::where("ticket_id","!=",null)->get();
        return view('admin.ticket.show',compact('ticket','TicketsAnswear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
