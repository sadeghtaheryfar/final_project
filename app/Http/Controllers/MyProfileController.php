<?php

namespace App\Http\Controllers;

use App\Http\Services\comparisonProduct;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\favouriteProduct;

class MyProfileController extends Controller
{
    public function index()
    {
        return view('app.myProfile');
    }

    public function myOrders(string $filter)
    {

        $user = auth()->user();
        if ($filter == '1') {
            $myOrders = $user->orders;
        } else if ($filter == '2') {

            $myOrders = Order::where('user_id', $user->id)->where('delivery_id', '1')->get();
        } else if ($filter == '3') {

            $myOrders = Order::where('user_id', $user->id)->where('delivery_id', '2')->get();
        }
        if (isset($myOrders)) {
            return view('app.myOrders', compact('myOrders'));
        } else {
            $orderMessage = 'شما تا کنون سفارشی نداشته اید';
            return view('app.myOrders', compact('orderMessage'));
        }
    }

    public function myOrderItems(Order $order)
    {
        return view('app.showMyOrderItems', compact('order'));
    }

    public function myFavorites(favouriteProduct $favoriteProducts)
    {

        $favoriteProducts = $favoriteProducts->ShowFavouriteProduct();
        return view('app.myFavorites', compact('favoriteProducts'));
    }

    public function myComparisons(comparisonProduct $ComparisonsProducts)
    {

        $ComparisonsProducts = $ComparisonsProducts->ShowComparisonProduct();
        if($ComparisonsProducts == null || $ComparisonsProducts == "")
        {
            $ComparisonsProducts = [];
        }
        return view('app.myComparisons', compact('ComparisonsProducts'));
    }

    public function orderRegistration(Request $request, Cart $cart)
    {
        $payment_id = $request->paymentType;
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'payment_id' => '1',
            'delivery_id' => '1',
            'discount_amount' => $cart->discount_amount,
            'discount_code' => $cart->discount_code,
        ]);

        foreach ($cart->cartItems as $cartItem) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
            ]);
        }


        foreach ($cart->cartItems as $cartItem) {
            $cartItem->forceDelete();
        }

        $cart->forceDelete();

        DB::commit();



        return to_route('myOrders', 1)->with('swal-success', 'سفارش شما با موفقیت ثبت شد . ');
    }


    public function editMyProfile()
    {
        return view('app.editMyProfile');
    }


    public function updateMyProfile(Request $request)
    {

        $user = Auth::user();
        $user->update(['first_name' =>  $request->first_name]);
        $user->update(['last_name' =>  $request->last_name]);
        $user->update(['national_code' =>  $request->national_code]);
        $user->save();

        return to_route('myProfile')->with('swal-success', 'پروفایل با موفقیت ویرایش شد . ');
    }
}
