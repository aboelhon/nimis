<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



// START CATEGOIRIES
######### START MEN CATEGORIES #########
Route::get('category/men/pants', function () {
    return view('category/men/pants');
})->name('men.pants');
Route::get('category/men/tishirts', function () {
    return view('category/men/tishirts');
})->name('men.tishirts');
Route::get('category/men/tishirts', function () {
    return view('category/men/tishirts');
})->name('men.tishirts');
Route::get('category/men/shoes', function () {
    return view('category/men/shoes');
})->name('men.shoes');
Route::get('category/men/underwear', function () {
    return view('category/men/underwear');
})->name('men.underwear');


######### START WOMEN CATEGORIES #########
Route::get('category/women/pants', function () {
    return view('category/women/pants');
})->name('women.pants');
Route::get('category/women/tishirts', function () {
    return view('category/women/tishirts');
})->name('women.tishirts');
Route::get('category/women/tishirts', function () {
    return view('category/women/tishirts');
})->name('women.tishirts');
Route::get('category/women/shoes', function () {
    return view('category/women/shoes');
})->name('women.shoes');
Route::get('category/women/underwear', function () {
    return view('category/women/underwear');
})->name('women.underwear');
######### END WOMEN CATEGORIES #########

######### START KIDS CATEGORIES #########
Route::get('category/kids/pants', function () {
    return view('category/kids/pants');
})->name('kids.pants');
Route::get('category/kids/tishirts', function () {
    return view('category/kids/tishirts');
})->name('kids.tishirts');
Route::get('category/kids/tishirts', function () {
    return view('category/kids/tishirts');
})->name('kids.tishirts');
Route::get('category/kids/shoes', function () {
    return view('category/kids/shoes');
})->name('kids.shoes');
Route::get('category/kids/underwear', function () {
    return view('category/kids/underwear');
})->name('kids.underwear');
######### END KIDS CATEGORIES #########

// END CATEGOIRIES