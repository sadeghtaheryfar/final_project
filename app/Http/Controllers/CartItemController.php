<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use function PHPUnit\Framework\isNull;

use function PHPUnit\Framework\isEmpty;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\StoreCart_itemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Http\Services\favouriteProduct;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cartItem=CartItem::find('cart_id',2);
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
    public function store(StoreCartItemRequest $request, Product $product)
    {
        //

    }

    public function storeToCartItem(Product $product)
    {
        $user = auth()->user();
        $cart = $user->cart;
        if ($cart == null) {

            $cart = Cart::create([
                'user_id' => $user->id,
                'payment_id' => '1',
                'delivery_id' => '1',
            ]);
        }

        $id = $product->id;
        if (CartItem::where('product_id', $id)->doesntExist()) {
            $newcartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'number' => '1',
            ]);
        }

        return to_route('cart.index')->with('swal-success', 'محصول با موفقیت به سبد خرید اضاف شد . ');
    }

    public function addTOMyFavourite(favouriteProduct $favouriteProduct, Product $product)
    {
        $user = auth()->user();
        $favouriteProduct->addTOFavouriteProduct($user, $product);
        return back()->with('swal-success', 'محصول با موفقیت به علاقه مندی ها اضاف شد . ');
    }




    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem->forceDelete();
        $user = auth()->user();
        $cart = $user->cart;
        $cartItem = $user->cart->cartItems->first();
        if ($cartItem == null) {
            $cart->forceDelete();
        }

        return back()->with('swal-success', 'محصول با موفقیت از سبد خرید حذف شد . ');
    }
}
