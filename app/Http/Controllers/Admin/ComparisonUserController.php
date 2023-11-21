<?php

namespace App\Http\Controllers\Admin;

use App\Models\ComparisonUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComparisonUserRequest;
use App\Http\Requests\UpdateComparisonUserRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class ComparisonUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComparisonUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ComparisonUser $comparisonUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComparisonUser $comparisonUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComparisonUserRequest $request, ComparisonUser $comparisonUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComparisonUser $comparisonUser)
    {
        //
    }


    public function AddToComparison(Product $product)
    {
        $comprasion = ComparisonUser::where("product_id", $product->id)->get();
        if ($comprasion && sizeof($comprasion) == 0) {
            $inputs['user_id'] = Auth::user()->id;
            $inputs['product_id'] = $product->id;
            ComparisonUser::create($inputs);
        }
        return back()->with('swal-success', 'محصول با موفقیت به لیست مقایسه اضاف شد . ');
    }


    public function RemoveComparisonProduct(ComparisonUser $comrasion)
    {
        $comrasion->delete();
        return back()->with('swal-success', 'محصول با موفقیت از لیست مقایسه حذف شد . ');
    }
}
