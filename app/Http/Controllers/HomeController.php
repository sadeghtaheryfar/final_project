<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $last_products = Product::orderBy('created_at','desc')->limit(10)->get();

        $suggestion_products = Product::where('suggestion',1)->orderBy('created_at','desc')->limit(10)->get();

        $banners = Banner::all();

        return view('app.index',compact('last_products','suggestion_products','banners'));
    }
}