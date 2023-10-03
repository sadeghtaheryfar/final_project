<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Services\ImageUploadService;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $result = $imageUploadService->uploadFile($request->file('image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
            }
            $inputs['image'] = $result;
        }

        Banner::create($inputs);
        return to_route('admin.banners.index')->with('swal-success', 'بنر جدید با موفقیت اد شد .');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($banner->image)) {
                $imageUploadService->removeFile($banner->image);
            }
            $result = $imageUploadService->uploadFile($request->file('image'));
            if ($result === false) {
                return back()->with('swal-error', 'خطایی در فرایند آپلود اتفاق افتاد');
            }
            $inputs['image'] = $result;
        }

        $banner->update($inputs);
        return to_route('admin.banners.index')->with('swal-success', 'بنر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('swal-success', 'بنر با موفقیت حذف شد');
    }
}
