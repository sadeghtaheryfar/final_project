<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\DiscountCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountCodeRequest;
use App\Http\Requests\UpdateDiscountCodeRequest;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DiscountCodes = DiscountCode::all();
        return view('admin.DiscountCode.index', compact('DiscountCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('admin.DiscountCode.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountCodeRequest $request)
    {
        $inputs = $request->all();

        if($request->type == 0)
        {
            $inputs['user_id'] = null;
        }

        if($request->amount_type == 1)
        {
            $inputs['discount_celing'] = null;
        }

        $realTimeStart = substr($inputs['start_date'], 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int)$realTimeStart);

        $realTimeEnd = substr($inputs['end_date'], 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int)$realTimeEnd);

        DiscountCode::create($inputs);
        return to_route('admin.discount-code.index')->with('swal-success', 'کد تخفیف با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscountCode $discountCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscountCode $discountCode)
    {
        $users = User::get();

        return view('admin.DiscountCode.edit',compact('discountCode','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountCodeRequest $request, DiscountCode $discountCode)
    {
        $inputs = $request->all();

        if($request->type == 0)
        {
            $inputs['user_id'] = null;
        }

        if($request->amount_type == 1)
        {
            $inputs['discount_celing'] = null;
        }

        $realTimeStart = substr($inputs['start_date'], 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', (int)$realTimeStart);

        $realTimeEnd = substr($inputs['end_date'], 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', (int)$realTimeEnd);

        
        $discountCode->update($inputs);
        return redirect()->route('admin.discount-code.index')->with('swal-success', ' کد تخفیف با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountCode $discountCode)
    {
        $discountCode->delete();
        return back()->with('swal-success', ' کد تخفیف با موفقیت حذف شد');
    }
}
