<?php

namespace App\Http\Services;

use App\Models\Cart;



class totalPrice{

    public function totalprice(Cart $cart)
    {
        $total=0;
        if ($cart!=null){        
        foreach ($cart->CartItems as $CartItem)
        {
          $total+= $CartItem->product->price;
        }
         }
        return $total;

    }
  


}

