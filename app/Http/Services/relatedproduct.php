<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class relatedProduct{

    public function ShowRelatedProduct()
    {
        $user=auth()->user();
        $cart= $user->cart;
        $ProductCategories = [];
        foreach ($cart->cartItems as $cartItem)
        {
            $ProductCategories[] = $cartItem->product->category_id;
        }
        $ProductCategories = array_unique($ProductCategories);

       $relatedProducts= Product::where(function($q) use ($ProductCategories) {
            $firstCase = array_shift($ProductCategories);
            $q->where('category_id', $firstCase);
            foreach($ProductCategories as $ProductCategory) {
               $q->orWhere('category_id', $ProductCategory);
            }})->get();

            return $relatedProducts;

    }
  


}

