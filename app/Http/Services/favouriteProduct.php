<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Product;

class favouriteProduct
{

    public function addTOFavouriteProduct(User $user, Product $product)
    {

        $oldfavorites = $user->favorite;
        $oldfavoriteARR = explode(',', $user->favorite);

        if(array_search($product->id , $oldfavoriteARR) == false) {
            $user->update(['favorite' =>  $oldfavorites . ',' . $product->id]);
            $user->save();
        }
    }
    public function ShowFavouriteProduct()
    {
        $user = auth()->user();

        if ($user->favorite != null) {
            $favoriteProducts = explode(',', $user->favorite);

            $favoriteProducts = Product::where(function ($q) use ($favoriteProducts) {
                $firstCase = $favoriteProducts[0];
                $q->where('id', $firstCase);
                foreach ($favoriteProducts as $favoriteProduct) {
                    $q->orWhere('id', $favoriteProduct);
                }
            })->get();

            return $favoriteProducts;
        } else {
            return null;
        }
    }


    public function RemoveFromFavouriteProduct(User $user, Product $product)
    {
        if ($user->favorite != null) {
            $favoriteProducts = explode(',', $user->favorite);
            if (($key = array_search("$product->id", $favoriteProducts)) !== false) {
                unset($favoriteProducts[$key]);
            }

            $favoriteProducts = implode(',', $favoriteProducts);

            $user->update(['favorite' =>  $favoriteProducts]);
            $user->save();
        }
    }
}
