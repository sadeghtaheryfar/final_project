<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailRequest;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\Email\EmailService;
use App\Jobs\SendEmailToUsers;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Email::all();
        return view('admin.email.index',compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.email.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailRequest $request)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        Email::create($inputs);
        return to_route('admin.email.index')->with('swal-success', 'اعلامیه ایمیلی جدید با موفقیت اد شد .');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        return view('admin.email.edit',compact('email'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailRequest $request,Email $email)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        $email->update($inputs);

        return to_route('admin.email.index')->with('swal-success', 'اطلاعیه ایمیلی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return back()->with('swal-success', 'اعلامیه ایمیلی با موفقیت حذف شد');
    }


    public function SendEmail(Email $email)
    {
        SendEmailToUsers::dispatch($email);

        return back()->with('swal-success', 'اعلامیه ایمیلی با موفقیت ارسال شد');
    }
}
