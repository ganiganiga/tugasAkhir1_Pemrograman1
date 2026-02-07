<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserOrderController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES (FRONTEND)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('pages.home', compact('products'));
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/collection', function () {
    return view('pages.collection');
});

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

/*
|--------------------------------------------------------------------------
| CHECKOUT & ORDER
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/order-success', function () {
    if (!session('user_logged_in')) {
        return redirect('/login');
    }
    return view('pages.order-success');
});

/*
|--------------------------------------------------------------------------
| AUTH USER (SIMULASI)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
});

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        'role' => 'user',
    ]);

    session([
        'user_logged_in' => true,
        'user_id' => $user->id,
        'user_name' => $user->name,
        'user_email' => $user->email,
        'user_role' => $user->role,
    ]);

    return redirect('/')->with('success', 'Akun berhasil dibuat dan Anda sudah login');
});

Route::post('/login', function (Request $request) {
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        session([
            'user_logged_in' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
        ]);

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/');
        }
    }

    return redirect('/login')->with('error', 'Email atau password salah');
});

Route::post('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| USER PROTECTED
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    return view('pages.profile');
});

Route::get('/order-history', [UserOrderController::class, 'index'])->name('user.order.history');

Route::post('/profile', function (Request $request) {

    session([
        'user_name'  => $request->name,
        'user_email' => $request->email,
    ]);

    return back();
});

Route::get('/product/{slug}', function ($slug) {
    return view('pages.product-detail', compact('slug'));
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // login admin
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    // protected admin
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::resource('products', AdminProductController::class);
        Route::get('orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::put('orders/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
    });

});
