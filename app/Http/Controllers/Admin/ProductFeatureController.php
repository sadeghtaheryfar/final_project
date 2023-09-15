<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\StoreProductFeatureRequest;
use App\Http\Requests\UpdateProductFeatureRequest;

class ProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.product.feature.show', compact('product'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.product.feature.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductFeatureRequest $request, Product $product)
    {
        $inputs = $request->all();
        $feature = new ProductFeature();
        $inputs['product_id'] = $product->id;
        $feature->create($inputs);
        return to_route('admin.feature', $product)->with('swal-success', 'ویژگی محصول با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductFeature $productFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductFeatureRequest $request, ProductFeature $productFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductFeature $productFeature)
    {
        $productFeature->delete();
        return back()->with('swal-success', 'ویژگی محصول با موفقیت حذف شد');
    }
}
