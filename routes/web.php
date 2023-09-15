<?php

use App\Models\ProductFeature;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\PannleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OfflinePaymentController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductFeatureController;
use App\Http\Controllers\Admin\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth','verified','VerifyAdmin')->group(function () {
    Route::get('/', PannleController::class);
    Route::resource('product', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('order', OrderController::class);
    Route::get('gallery/{product}', [ProductImageController::class,'index'])->name('gallery');
    Route::delete('gallery/{product_image}', [ProductImageController::class,'destroy'])->name('gallery.delete');
    Route::get('gallery/{product}/add', [ProductImageController::class,'create'])->name('gallery.create');
    Route::post('gallery/{product}/add', [ProductImageController::class,'store'])->name('gallery.store');
    Route::get('feature/{product}', [ProductFeatureController::class,'index'])->name('feature');
    Route::delete('feature/{product_feature}', [ProductFeatureController::class,'destroy'])->name('feature.delete');
    Route::get('feature/{product}/add', [ProductFeatureController::class,'create'])->name('feature.create');
    Route::post('feature/{product}/add', [ProductFeatureController::class,'store'])->name('feature.store');
    Route::resource('product-category', ProductCategoryController::class);
    Route::get('comment/change/{comment}', [CommentController::class, 'change'])->name('comment.change');
    Route::resource('comment', CommentController::class);
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('discount-code', DiscountCodeController::class);
});


Route::get('/myProfile/editMyProfile', [myProfileController::class, 'editMyProfile'])->name('myProfile.editMyProfile')->middleware('auth','verified');
Route::put('/myProfile/updateMyProfile', [myProfileController::class, 'updateMyProfile'])->name('myProfile.updateMyProfile')->middleware('auth','verified');
Route::get('/myProfile', [myProfileController::class, 'index'])->name('myProfile')->middleware('auth','verified');
Route::get('/myOrders/{filter}', [myProfileController::class, 'myOrders'])->name('myOrders')->middleware('auth','verified');
Route::get('myOrder/myOrderItems/{order}', [myProfileController::class, 'myOrderItems'])->name('myOrder.myOrderItems')->middleware('auth','verified');
Route::get('/myFavorites', [myProfileController::class, 'myFavorites'])->name('myFavorites')->middleware('auth','verified');
Route::get('/myComparisons', [myProfileController::class, 'myComparisons'])->name('myComparisons')->middleware('auth','verified');
Route::post('/orderRegistration/{cart}', [myProfileController::class, 'orderRegistration'])->name('orderRegistration')->middleware('auth','verified');
Route::post('cart/discount-code', [CartController::class,'discountCode'])->name('cart.discountCode')->middleware('auth','verified');
Route::resource('cart', CartController::class)->middleware('auth','verified');
Route::get('cartItem/storeToCartItem/{product}',[CartItemController::class, 'storeToCartItem'])->name('cartItem.storeToCartItem')->middleware('auth','verified');
Route::get('cartItem/addTOMyFavourite/{product}',[CartItemController::class, 'addTOMyFavourite'])->name('cartItem.addTOMyFavourite')->middleware('auth','verified');
Route::resource('cartItem', CartItemController::class)->middleware('auth','verified');
Route::get('adress/showPayment',[AdressController::class, 'showPayment'])->name('adress.showPayment')->middleware('auth','verified');
Route::resource('adress', AdressController::class)->middleware('auth','verified');
Route::resource('offlinePayment', OfflinePaymentController::class)->middleware('auth','verified');


Route::get('products/AddToFavorite/{product}',[ProductsController::class, 'AddToFavorite'])->name('products.AddToFavorite')->middleware('auth','verified');
Route::get('products/RemoveFromFavouriteProduct/{product}',[ProductsController::class, 'RemoveFromFavouriteProduct'])->name('products.RemoveFromFavouriteProduct')->middleware('auth','verified');
Route::get('products/AddToComparison/{product}',[ProductsController::class, 'AddToComparison'])->name('products.AddToComparison')->middleware('auth','verified');
Route::get('products/RemoveComparisonProduct/{product}',[ProductsController::class, 'RemoveComparisonProduct'])->name('products.RemoveComparisonProduct')->middleware('auth','verified');
Route::get('products/showProductComment/{product}',[ProductsController::class, 'showProductComment'])->name('products.showProductComment')->middleware('auth','verified');
Route::post('products/storeComment/{product}',[ProductsController::class, 'storeComment'])->name('products.storeComment')->middleware('auth','verified');
Route::post('products/storeRaiting/{product}',[ProductsController::class, 'storeRaiting'])->name('products.storeRaiting')->middleware('auth','verified');
Route::resource('products', ProductsController::class);

require __DIR__.'/auth.php';
