<?php

use App\Models\User\Cart;
use App\Models\Admin\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    if (Auth::guard('user')->check()) {
        return redirect(route('user.dashboard'));
    }
    return view('user.login');
})->name('user.login');

Route::get('/register', function () {
    if (Auth::guard('user')->check()) {
        return to_route('home');
    }
    return view('user.register');
})->name('user.register');



Route::middleware(['UserMiddleware'])->group(function () {
    Route::get('dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('settings', function () {
        return view('user.settings');
    })->name('user.settings');

    Route::get('cart', function () {
        return view('user.cart');
    })->name('user.cart');

    Route::get('/products/{id:slug}', function ($id) {
        $item = Item::where('slug', $id)->first();
        if (!$item) {
            return abort('404');
        }
        return view('products', compact('item'));
    })->name('productid');


    Route::get('/checkout', function () {
        return view('user.checkout');
    })->name('user.checkout');


    Route::get('/order', function () {
        return view('user.order');
    })->name('user.order');

    Route::get('/logout', function () {
        Auth::guard('user')->logout();
        return redirect(route('user.login'));
    })->name('user.logout');
});

Route::middleware(['InActiveUserMiddleware'])->group(function () {  // for inactive users

    Route::get('/active', function () {
        return view('user.active');
    })->name('user.active');
});
