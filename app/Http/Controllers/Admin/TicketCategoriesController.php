<?php

namespace App\Http\Controllers\Admin;

use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketCategoriesRequest;
use App\Http\Requests\UpdateTicketCategoriesRequest;

class TicketCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TicketCategories = TicketCategory::all();
        return view('admin.TicketCategories.index', compact('TicketCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.TicketCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketCategoriesRequest $request)
    {
        $inputs = $request->all();
        TicketCategory::create($inputs);
        return redirect()->route('admin.tickets-category.index')->with('swal-success', 'دسته بندی تیکت جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketCategory $ticket_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($TicketCategory)
    {
        //  این قسمت روت مدل بایندینگ نمی شد مجبور شدم .
        $TicketCategory = TicketCategory::find($TicketCategory);
        return view('admin.TicketCategories.edit', compact('TicketCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketCategoriesRequest $request,$TicketCategory)
    {
        $inputs = $request->all();
        $TicketCategory = TicketCategory::find($TicketCategory);
        $TicketCategory->update($inputs);
        return redirect()->route('admin.tickets-category.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($TicketCategory)
    {
        $TicketCategory = TicketCategory::find($TicketCategory);
        $result = $TicketCategory->delete();
        return redirect()->route('admin.tickets-category.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت حذف شد');
    }
}
