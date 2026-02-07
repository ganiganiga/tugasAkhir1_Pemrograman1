<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/shop', function () {
    return view('pages.shop');
});

Route::get('/collection', function () {
    return view('pages.collection');
});

Route::get('/cart', function () {
    return view('pages.cart');
});

/*
|--------------------------------------------------------------------------
| Auth Pages (Frontend Simulation)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
});

/* LOGIN (SIMULASI) */
Route::post('/login', function (Request $request) {

    session([
        'user_logged_in' => true,
        'user_name'  => 'John Doe',
        'user_email' => 'john@email.com',
    ]);

    // setelah login, kembali ke halaman sebelumnya jika ada
    return redirect()->intended('/');
});

/* LOGOUT */
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| Protected Pages (Wajib Login)
|--------------------------------------------------------------------------
*/

/* CHECKOUT */
Route::get('/checkout', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }

    return view('pages.checkout');
});

/* PROFILE */
Route::get('/profile', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }

    return view('pages.profile');
});

/* UPDATE PROFILE (SIMULASI) */
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

Route::get('/profile', function () {
    if (!session('user_logged_in')) {
        return redirect('/login');
    }
    return view('pages.profile');
});

Route::get('/order-success', function () {
    if (!session('user_logged_in')) {
        return redirect('/login');
    }
    return view('pages.order-success');
});
