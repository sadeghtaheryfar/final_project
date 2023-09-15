<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Product;

class comparisonProduct
{

    public function addTOComparisonProduct(User $user, Product $product)
    {

        $oldcomparisons = $user->comparison;
        $oldfavoriteARR = explode(',', $user->comparison);

        if(array_search($product->id , $oldfavoriteARR) == false) {
            $user->update(['comparison' =>  $oldcomparisons . ',' . $product->id]);
            $user->save();
        }
    }
    public function ShowComparisonProduct()
    {
        $user = auth()->user();

        if ($user->comparison != null) {
            $comparisonProducts = explode(',', $user->comparison);

            $comparisonProducts = Product::where(function ($q) use ($comparisonProducts) {
                $firstCase = $comparisonProducts[0];
                $q->where('id', $firstCase);
                foreach ($comparisonProducts as $comparisonProduct) {
                    $q->orWhere('id', $comparisonProduct);
                }
            })->get();

            return $comparisonProducts;
        } else {
            return null;
        }
    }


    public function RemoveFromComparisonProduct(User $user, Product $product)
    {
        if ($user->comparison != null) {
            $comparisonProducts = explode(',', $user->comparison);
            if (($key = array_search("$product->id", $comparisonProducts)) !== false) {
                unset($comparisonProducts[$key]);
            }

            $comparisonProducts = implode(',', $comparisonProducts);

            $user->update(['comparison' =>  $comparisonProducts]);
            $user->save();
        }
    }
}
