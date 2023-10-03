<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use App\Http\Services\ImageUploadService;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.product.gallery.show', compact('product'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.product.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductImageRequest $request, Product $product, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $result = $imageUploadService->uploadFile($request->file('image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
            }
            $inputs['image'] = $result;
        }
        $gallery = new ProductImage();
        $inputs['product_id'] = $product->id;
        $gallery->create($inputs);
        return to_route('admin.gallery', $product)->with('swal-success', 'عکس محصول با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete($productImage);
        return back()->with('swal-success', 'عکس محصول با موفقیت حذف شد');
    }
}
