<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use App\Http\Services\totalPrice;
use App\Http\Services\relatedProduct;
use App\Http\Requests\StoreCartRequest;
use App\Http\Services\favouriteProduct;
use Illuminate\Validation\Rules\Exists;
use App\Http\Requests\UpdateCartRequest;
use PHPUnit\Framework\Constraint\IsNull;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(relatedProduct $relatedProduct, totalPrice $totalPrice)
    {
        $user = auth()->user();
        $cart = $user->cart;
        if ($cart == null) {
            $relatedProducts = Product::all()->take(5);
            return view('app.cart', compact('cart', 'relatedProducts'));
        } else {
            $total = $totalPrice->totalprice($cart);
            $relatedProducts = $relatedProduct->ShowRelatedProduct();
            return view('app.cart', compact('cart', 'total', 'relatedProducts'));
        }
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
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('swal-success', 'سبد خرید با موفقیت حذف شد .');
    }
}
