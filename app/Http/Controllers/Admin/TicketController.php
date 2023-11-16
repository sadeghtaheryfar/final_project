<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Tickets;
use App\Models\TicketFiles;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Models\TicketPriorities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ImageUploadService;
use App\Http\Requests\StoreMyTicketsRequest;
use App\Http\Requests\UpdateMyTicketsRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function open()
    {
        $tickets = Tickets::where("ticket_id",null)->where("status",1)->get()->sortDesc();
        return view('admin.ticket.index',compact('tickets'));
    }

    public function close()
    {
        $tickets = Tickets::where("ticket_id",null)->where("status",0)->get()->sortDesc();
        return view('admin.ticket.index',compact('tickets'));
    }


    public function index()
    {
        $tickets = Tickets::where("ticket_id",null)->get()->sortDesc();
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
        $users = User::all();
        $categories = TicketCategory::all();
        $priorities = TicketPriorities::all();
        return view('admin.ticket.create',compact('users', 'categories', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMyTicketsRequest $request, ImageUploadService $imageUploadService)
    {$inputs = $request->all();
        $user = Auth::user();
        $inputs['user_id'] = $user->id;
        $ticket = Tickets::create($inputs);
        if ($request->hasFile('file')) {
            $result = $imageUploadService->uploadFile($request->file('file'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
                exit();
            }
            $inputsFile['file_path'] = $result;
            $inputsFile['reference_id'] = $user->id;
            $inputsFile['ticket_id'] = $ticket->id;
            TicketFiles::create($inputsFile);
        }
        return redirect()->route('admin.tickets.index')->with('swal-success', 'تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $ticket)
    {
        $TicketsAnswear = Tickets::where("ticket_id", $ticket->id)->get()->sortDesc();
        $myTicket = $ticket;
        $categories = TicketCategory::all();
        $priorities = TicketPriorities::all();
        $users = User::all();
        return view('admin.ticket.show',compact('myTicket','TicketsAnswear','priorities','categories','users'));
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
    public function update(UpdateMyTicketsRequest $request, Tickets $ticket, ImageUploadService $imageUploadService)
    {
        $myTicket = $ticket;
        $inputs = $request->all();
        $user = Auth::user();
        $inputs['subject'] = $myTicket->subject;
        $inputs['reference_id'] = $user->id;
        $inputs['ticket_id'] = $myTicket->id;
        $inputs['category_id'] = $myTicket->category_id;
        $inputs['priority_id'] = $myTicket->priority_id;
        $NewTicket = Tickets::create($inputs);
        $myTicket->status = $inputs['status'];
        $myTicket->update();
        if ($request->hasFile('file')) {
            $result = $imageUploadService->uploadFile($request->file('file'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
                exit();
            }
            $inputsFile['file_path'] = $result;
            $inputsFile['user_id'] = $user->id;
            $inputsFile['ticket_id'] = $NewTicket->id;
            TicketFiles::create($inputsFile);
        }
        return redirect()->route('admin.tickets.index')->with('swal-success', 'پاسخ تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $ticket)
    {
        $ticket->delete();

        return back()->with('swal-success', 'تیکیت با موفقیت حذف شد .');
    }
}