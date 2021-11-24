<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Index;
use App\Http\Livewire\Shop;
use App\Http\Livewire\MyCart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\UserDashboard;
use App\Http\Livewire\AdminDashboard;
use App\Http\Livewire\Adm\AdminCategory;
use App\Http\Livewire\Adm\AdminAddCategory;
use App\Http\Livewire\Adm\AdminEditCategory;

use App\Http\Livewire\Adm\AdminProduct;
use App\Http\Livewire\Adm\AdminAddProduct;
use App\Http\Livewire\Adm\AdminEditProduct;

use App\Http\Livewire\Adm\AdminOrder;
use App\Http\Livewire\Adm\AdminShowOrder;

use App\Http\Livewire\User\UserOrder;
use App\Http\Livewire\User\UserShowOrder;

use App\Http\Livewire\ProductDetail;

use App\Http\Livewire\OrderFinished;

use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::get('/', Index::class )->name('home');

Route::get('/', Shop::class )->name('all.products');

Route::get('/category/{categorySlug?}', Shop::class )->name('category.products');

Route::get('/search', Shop::class )->name('search.products');

Route::get('/my-cart', MyCart::class )->name('my.cart');

Route::get('/checkout', Checkout::class )->name('checkout.now');

Route::get('/product/{slug}', ProductDetail::class)->name('product.detail');

Route::get('/thanks', OrderFinished::class)->name('order.finished');



// User
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/account', UserDashboard::class)->name('user.dashboard');
    
    Route::get('/account/orders', UserOrder::class)->name('user.orders');
    Route::get('/account/orders/{orderId}', UserShowOrder::class)->name('user.showorder');
});

// Admin
Route::middleware(['auth:sanctum', 'adminauth'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/dashboard/categories', AdminCategory::class)->name('admin.categories');
    Route::get('/dashboard/categories/add', AdminAddCategory::class)->name('admin.addcategory');
    Route::get('/dashboard/categories/edit/{categoryId}', AdminEditCategory::class)->name('admin.editcategory');

    Route::get('/dashboard/products', AdminProduct::class)->name('admin.products');
    Route::get('/dashboard/products/add', AdminAddProduct::class)->name('admin.addproduct');
    Route::get('/dashboard/products/edit/{productId}', AdminEditProduct::class)->name('admin.editproduct');

    Route::get('/dashboard/orders', AdminOrder::class)->name('admin.orders');
    Route::get('/dashboard/orders/{orderId}', AdminShowOrder::class)->name('admin.showorder');
});

//Verificacion
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
