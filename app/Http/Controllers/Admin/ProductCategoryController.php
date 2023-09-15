<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ProductCategories = ProductCategory::all();
        return view('admin.category.index', compact('ProductCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $inputs = $request->all();
        $ProductCategory = ProductCategory::create($inputs);
        return redirect()->route('admin.product-category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $ProductCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $ProductCategory)
    {

        return view('admin.category.edit', compact('ProductCategory'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategory $ProductCategory, UpdateProductCategoryRequest $request)
    {
        $inputs = $request->all();
        $ProductCategory->update($inputs);
        return redirect()->route('admin.product-category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $ProductCategory)
    {
        $result = $ProductCategory->delete();
        return redirect()->route('admin.product-category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
