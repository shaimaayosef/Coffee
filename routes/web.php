<?php

use Illuminate\Support\Facades\Auth; // Add this line

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/addBeverage', function () {
    return view('addBeverage');
})->name('addBeverage');

Route::get('/addCategory', function () {
    return view('addCategory');
})->name('addCategory');

Route::get('/addUser', function () {
    return view('addUser');
})->name('addUser');

Route::get('/users', function () {
    return view('users');
})->name('users');
Route::get('/beverages', function () {
    return view('beverages');
})->name('beverages');

Route::get('/categories', function () {
    return view('categories');
})->name('categories');

Route::get('/messages', function () {
    return view('messages');
})->name('messages');

Route::get('/showMessage', function () {
    return view('showMessage');
})->name('showMessage');

Route::get('/editBeverage', function () {
    return view('editBeverage');
})->name('editBeverage');

Route::get('/editCategory', function () {
    return view('editCategory');
})->name('editCategory');

Route::get('/editUser', function () {
    return view('editUser');
})->name('editUser');
Route::get('/main', function () {
    return view('main');
})->name('main');


