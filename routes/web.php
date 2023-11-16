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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\PannleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OfflinePaymentController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\NotifacationController;
use App\Http\Controllers\Admin\PermissonController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductFeatureController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SMSController;
use App\Http\Controllers\Admin\TicketAdminsController;
use App\Http\Controllers\Admin\TicketCategoriesController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\Admin\TicketPrioritiesController;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;
use App\Http\Controllers\MyTicketsController;
use App\Models\MyTickets;
use App\Models\Permission;
use App\Models\Role;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth','VerifyAdmin')->group(function () {
    Route::get('/', PannleController::class);
    Route::resource('product', ProductController::class);
    Route::get('tickets/close', [TicketController::class,'close'])->name('tickets.close');
    Route::get('tickets/open', [TicketController::class,'open'])->name('tickets.open');
    Route::resource('tickets', TicketController::class);
    Route::resource('tickets-admins', TicketAdminsController::class);
    Route::resource('tickets-category', TicketCategoriesController::class);
    Route::resource('tickets-priorities', TicketPrioritiesController::class);
    Route::get('users/setAdmin/{user}', [AdminController::class,'AdminsSet'])->name('users.AdminsSet');
    Route::get('users/roles/{user}', [AdminController::class,'Roles'])->name('users.Roles');
    Route::post('users/RolesStore/{user}', [AdminController::class,'RolesStore'])->name('users.RolesStore');

    Route::get('users/Permissions/{user}', [AdminController::class,'Permissions'])->name('users.Permissions');
    Route::post('users/PermissionsStore/{user}', [AdminController::class,'PermissionsStore'])->name('users.PermissionsStore');

    Route::resource('users', AdminController::class);
    Route::get('email/send/{email}', [EmailController::class,'SendEmail'])->name('email.SendEmail');
    Route::get('sms/send/{sms}', [SMSController::class,'SendSMS'])->name('sms.SendSMS');
    Route::resource('sms', SMSController::class);
    Route::resource('email', EmailController::class);
    Route::get('admins', [AdminController::class,'admins'])->name('users.admins');
    Route::get('notifacations', [NotifacationController::class,'index'])->name('notifacations.index');
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
    Route::resource('yicket-category', ProductCategoryController::class);
    Route::resource('discount-code', DiscountCodeController::class);
    Route::get('role/EditPermission/{role}', [RoleController::class, 'EditPermission'])->name('role.EditPermission');
    Route::put('role/EditPermission/{role}', [RoleController::class, 'UpdatePermission'])->name('role.UpdatePermission');
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissonController::class);
});


Route::namespace('Auth.')->group(function () {
    Route::get('auth', [LoginRegisterController::class, 'loginRegisterForm'])->name('auth.customer.login-register-form');
    Route::post('auth', [LoginRegisterController::class, 'loginRegisterStore'])->name('auth.customer.login-register-store');

    Route::get('auth-otp/{otp}', [LoginRegisterController::class, 'loginConfirmForm'])->name('auth.customer.login-confirm-form');
    Route::post('auth-otp/{otp}', [LoginRegisterController::class, 'loginConfirmStore'])->name('auth.customer.login-confirm-store');
    Route::get('auth-otp-resend/{otp}', [LoginRegisterController::class, 'loginResendStore'])->name('auth.customer.login-resend-store');
});


Route::get('/myProfile/editMyProfile', [myProfileController::class, 'editMyProfile'])->name('myProfile.editMyProfile')->middleware('auth');
Route::put('/myProfile/updateMyProfile', [myProfileController::class, 'updateMyProfile'])->name('myProfile.updateMyProfile')->middleware('auth');
Route::get('/myProfile', [myProfileController::class, 'index'])->name('myProfile')->middleware('auth');
Route::resource('myTickets', MyTicketsController::class)->middleware('auth');
Route::get('/myOrders/{filter}', [myProfileController::class, 'myOrders'])->name('myOrders')->middleware('auth');
Route::get('myOrder/myOrderItems/{order}', [myProfileController::class, 'myOrderItems'])->name('myOrder.myOrderItems')->middleware('auth');
Route::get('/myFavorites', [myProfileController::class, 'myFavorites'])->name('myFavorites')->middleware('auth');
Route::get('/myComparisons', [myProfileController::class, 'myComparisons'])->name('myComparisons')->middleware('auth');
Route::post('/orderRegistration/{cart}', [myProfileController::class, 'orderRegistration'])->name('orderRegistration')->middleware('auth');
Route::post('cart/discount-code', [CartController::class,'discountCode'])->name('cart.discountCode')->middleware('auth');
Route::resource('cart', CartController::class)->middleware('auth');
Route::get('cartItem/storeToCartItem/{product}',[CartItemController::class, 'storeToCartItem'])->name('cartItem.storeToCartItem')->middleware('auth');
Route::get('cartItem/addTOMyFavourite/{product}',[CartItemController::class, 'addTOMyFavourite'])->name('cartItem.addTOMyFavourite')->middleware('auth');
Route::resource('cartItem', CartItemController::class)->middleware('auth');
Route::get('adress/showPayment',[AdressController::class, 'showPayment'])->name('adress.showPayment')->middleware('auth');
Route::resource('adress', AdressController::class)->middleware('auth');
Route::resource('offlinePayment', OfflinePaymentController::class)->middleware('auth');


Route::get('products/AddToFavorite/{product}',[ProductsController::class, 'AddToFavorite'])->name('products.AddToFavorite')->middleware('auth');
Route::get('products/RemoveFromFavouriteProduct/{product}',[ProductsController::class, 'RemoveFromFavouriteProduct'])->name('products.RemoveFromFavouriteProduct')->middleware('auth');
Route::get('products/AddToComparison/{product}',[ProductsController::class, 'AddToComparison'])->name('products.AddToComparison')->middleware('auth');
Route::get('products/RemoveComparisonProduct/{product}',[ProductsController::class, 'RemoveComparisonProduct'])->name('products.RemoveComparisonProduct')->middleware('auth');
Route::get('products/showProductComment/{product}',[ProductsController::class, 'showProductComment'])->name('products.showProductComment')->middleware('auth');
Route::post('products/storeComment/{product}',[ProductsController::class, 'storeComment'])->name('products.storeComment')->middleware('auth');
Route::post('products/storeRaiting/{product}',[ProductsController::class, 'storeRaiting'])->name('products.storeRaiting')->middleware('auth');
Route::resource('products', ProductsController::class);

require __DIR__.'/auth.php';
