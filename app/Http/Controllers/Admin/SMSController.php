<?php

namespace App\Http\Controllers\Admin;

use App\Models\SMS;
use App\Jobs\SendSMSToUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSMSRequest;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\Admin\SMSRequest;
use App\Http\Requests\UpdateSMSRequest;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms = SMS::all();
        return view('admin.sms.index', compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SMSRequest $request)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        SMS::create($inputs);
        return to_route('admin.sms.index')->with('swal-success', 'اعلامیه پیامکی جدید با موفقیت اد شد .');
    }

    /**
     * Display the specified resource.
     */
    public function show(SMS $sMS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SMS $sms)
    {
        return view('admin.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SMSRequest $request, SMS $sms)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        $sms->update($inputs);

        return to_route('admin.sms.index')->with('swal-success', 'اطلاعیه پیامکی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SMS $sms)
    {
        $sms->delete();
        return back()->with('swal-success', 'اعلامیه پیامکی با موفقیت حذف شد');
    }

    public function SendSMS(SMS $sms)
    {
        SendSMSToUsers::dispatch($sms);

        return back()->with('swal-success', 'اعلامیه پیامکی با موفقیت ارسال شد');
    }
}
