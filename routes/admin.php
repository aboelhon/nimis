<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/register', function () {
    if (Auth::guard('user')->check()) {
        return to_route('home');
    }
    return view('user.register');
})->name('user.register');
Route::middleware(['AdminMiddleware'])->group(function () {

    ###################  CRUD ADMIN ROUTES  ###################
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/admin/logout', function () {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    })->name('admin.logout');

    Route::get('/admin/admin/admin-all', function () {
        return view('admin.admin.all-admin');
    })->name('admin.all-admin');

    Route::get('/admin/admin/add', function () {
        return view('admin.admin.add-admin');
    })->name('admin.add-admin');

    Route::get('/admin/admin/delete-admin', function () {
        return view('admin.admin.delete-admin');
    })->name('admin.deleted-admin');




    ###################  CRUD USERS ROUTES  ###################

    Route::get('/admin/user/user-all', function () {
        return view('admin.user.all-user');
    })->name('admin.all-user');

    Route::get('/admin/user/add', function () {
        return view('admin.user.add-user');
    })->name('admin.add-user');

    Route::get('/admin/user/delete-user', function () {
        return view('admin.user.delete-user');
    })->name('admin.deleted-user');



    ###################  CRUD CATEGORIES ROUTES  ###################

    Route::get('/admin/category/category-all', function () {
        return view('admin.category.all-category');
    })->name('admin.all-category');

    Route::get('/admin/category/add', function () {
        return view('admin.category.add-category');
    })->name('admin.add-category');

    Route::get('/admin/category/delete-category', function () {
        return view('admin.category.delete-category');
    })->name('admin.deleted-category');



    ###################  CRUD ITEMS ROUTES  ###################

    Route::get('/admin/item/item-all', function () {
        return view('admin.item.all-items');
    })->name('admin.all-item');

    Route::get('/admin/item/add', function () {
        return view('admin.item.add-item');
    })->name('admin.add-item');

    Route::get('/admin/item/delete-item', function () {
        return view('admin.item.deleted-item');
    })->name('admin.deleted-item');


    ###################  CRUD ITEMS ROUTES  ###################
    Route::get('/admin/order/order', function () {
        return view('admin.order.order');
    })->name('admin.order');

    Route::get('/admin/order/delivered', function () {
        return view('admin.order.delivered');
    })->name('admin.delivered-order');

    Route::get('/admin/order/pending', function () {
        return view('admin.order.pending');
    })->name('admin.pending-order');
}); // end of adminmiddleware


###################  ADMIN LOGIN  ###################
Route::get('/admin/login', function () {
    if (Auth::guard('admin')->check()) {
        return redirect(route('admin.index'));
    } else {
        return view('admin.login');
    }
})->name('admin.login');
