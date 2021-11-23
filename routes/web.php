<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Index;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\UserDashboard;
use App\Http\Livewire\AdminDashboard;

use App\Http\Controllers\Admin\CategoryController;

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


Route::get('/', Index::class );

Route::get('/products', Shop::class );

Route::get('/my-cart', Cart::class );

Route::get('/checkout', Checkout::class );


// User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/account', UserDashboard::class)->name('user.dashboard');
});

// Admin
Route::middleware(['auth:sanctum', 'verified', 'adminauth'])->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
});
