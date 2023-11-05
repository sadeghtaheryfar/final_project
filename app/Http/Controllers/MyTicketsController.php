<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\MyTickets;
use App\Models\TicketCategory;
use App\Models\TicketPriorities;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ImageUploadService;
use App\Http\Requests\StoreMyTicketsRequest;
use App\Http\Requests\UpdateMyTicketsRequest;
use App\Models\TicketFiles;

class MyTicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tickets = Tickets::orderBy('created_at', 'desc')->where('ticket_id', null)->where('user_id', $user->id)->get();
        return view('profile.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TicketCategory::all();
        $priorities = TicketPriorities::all();
        return view('profile.ticket.create', compact('priorities', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMyTicketsRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();
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
            $inputsFile['user_id'] = $user->id;
            $inputsFile['ticket_id'] = $ticket->id;
            TicketFiles::create($inputsFile);
        }
        return redirect()->route('myTickets.index')->with('swal-success', 'تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $myTicket)
    {
        $user = Auth::user();
        $TicketsAnswear = Tickets::where("ticket_id", $myTicket->id)->get()->sortDesc();
        return view('profile.ticket.show', compact('myTicket', 'TicketsAnswear'));
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
    public function update(UpdateMyTicketsRequest $request, Tickets $myTicket, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();
        $user = Auth::user();
        $inputs['subject'] = $myTicket->subject;
        $inputs['user_id'] = $user->id;
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
