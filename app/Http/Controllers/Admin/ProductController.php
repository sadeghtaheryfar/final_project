<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Product_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ImageUploadService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        if ($request->hasFile('image')) {
            $result = $imageUploadService->uploadFile($request->file('image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
            }
            $inputs['image'] = $result;
        }

        Product::create($inputs);
        return to_route('admin.product.index')->with('swal-success', 'محصول با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();
        $realTime = substr($inputs['published_at'], 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageUploadService->removeFile($product->image);
            }
            $result = $imageUploadService->uploadFile($request->file('image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
            }
            $inputs['image'] = $result;
        }

        $product->update($inputs);
        return to_route('admin.product.index')->with('swal-success', 'محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('swal-success', 'محصول با موفقیت حذف شد');
    }
}
