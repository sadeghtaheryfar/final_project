<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Http\Services\totalPrice;
use Illuminate\Support\Facades\Auth;
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

    public function discountCode(Request $request, totalPrice $totalPrice)
    {
        $inputs = $request->all();

        $user = auth()->user();
        $cart = $user->cart;

        $request->validate(
            ['code' => 'required']
        );

        $code = DiscountCode::where(['code' => $inputs['code'], ['start_date', '<' , now()], ['end_date', '>' , now()]])->first();

        if($code != null)
        {
            if($code->type == 1)
            {
                if($code->user_id == Auth::user()->id)
                {
                    $code = DiscountCode::where(['code' => $inputs['code'], ['start_date', '<' , now()], ['end_date', '>' , now()],['user_id' , Auth::user()->id]])->first();
                }else{
                    
                    return back()->with('swal-error', 'کد تخفیف وارد شده معتبر نمی باشد .');
                    exit();
                }
            }
        }else{
            return back()->with('swal-error', 'کد تخفیف وارد شده معتبر نمی باشد .');
            exit();
        }

        $total = $totalPrice->totalprice($cart);

        if($code->amount_type == 0)
        {
            $totalDiscountAmount = $total * ($code->amount / 100);
            if($code->discount_celing != null && $totalDiscountAmount > $code->discount_celing)
            {
                $totalDiscountAmount = $code->discount_celing;
            }
        }else{
            $totalDiscountAmount = $code->amount;
        }

        $cart->update(['discount_amount' =>  $totalDiscountAmount]);
        $cart->update(['discount_code' =>  $request->code]);
        $cart->save();
        return back()->with('swal-success', 'کد تخفیف با موفقیت اعمال شد . ');
        exit();
    }
}
