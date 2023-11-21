<?php

namespace App\Http\Controllers;

use App\Http\Services\comparisonProduct;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\relatedProduct;
use App\Http\Services\favouriteProduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('app.product', compact('products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(relatedProduct $relatedProduct,Product $product)
    {
        $id=$product->category_id;
        $relatedProducts=Product::where('category_id',$id)->get();
        $comments=Comment::where('product_id',$product->id)->where('status', '2')->get();
        return view('app.ShowProduct',compact('product','relatedProducts','comments'));
    }


    public function storeComment(Request $request, Product $product){
        $comment=Comment::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'comment'=> $request->comment,
        ]);
        return back()->with('swal-success', 'نظر با موفقیت ثبت شد منتظر تایید ان باشید . ');
    }

    public function storeRaiting(Request $request, Product $product){
        if(Auth::check())
        {
            $user  = Auth::user();
            $user->rate($product,$request->rating);
        }
        return back()->with('swal-success', 'امتیاز با موفقیت ثبت شد .');
    }

    // public function showProductComment(Product $product){
        
    //     $comments=$product->comments;
    //     return view('app.ShowProduct',compact('comments'));

    // }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function AddToFavorite(Product $product,favouriteProduct $favouriteProduct)
    {    
        $user = auth()->user();
        $favouriteProduct->addTOFavouriteProduct($user,$product);
        return back()->with('swal-success', 'محصول با موفقیت به علاقه مندی ها اضافه شد . ');
    }


    public function RemoveFromFavouriteProduct(Product $product,favouriteProduct $favouriteProduct)
    {    
        $user = auth()->user();
        $favouriteProduct->RemoveFromFavouriteProduct($user,$product);
        return back()->with('swal-success', 'محصول با موفقیت از علاقه مندی ها حذف شد . ');
    }
}
