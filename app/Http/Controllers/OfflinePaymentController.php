<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OfflinePayment;
use App\Models\Offline_payment;
use App\Http\Requests\StoreOfflinePaymentRequest;
use App\Http\Requests\StoreOffline_paymentRequest;
use App\Http\Requests\UpdateOfflinePaymentRequest;
use App\Http\Requests\UpdateOffline_paymentRequest;

class OfflinePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;
        $total = 0;
        if ($cart !== null) {
            foreach ($cart->CartItems as $CartItem) {
                $total += $CartItem->product->price;
            }
        }
        $cartItemCount = $user->cart->cartItems->count();
        return view('app.payment', compact('cartItemCount', 'total', 'cart'));
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
    public function store(StoreOfflinePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OfflinePayment $offlinePayment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfflinePayment $offlinePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfflinePaymentRequest $request, OfflinePayment $offlinePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfflinePayment $offlinePayment)
    {
        //
    }
}
