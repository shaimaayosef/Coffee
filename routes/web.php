<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Auth; // Add this line

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['verify'=>true]);

Route::get('home', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('editUser/{id}', [Controller::class, 'edit'])->name('editUser');
Route::put('updateUsers/{id}',[Controller::class,'update'])->name('updateUsers');
Route::post('addNewUser',[Controller::class,'store'])->name('addNewUser');
Route::get('categories', [CategoriesController::class,'index'])->name('categories');
Route::post('addCategories', [CategoriesController::class,'store'])->name('addCategories');
Route::get('/addBeverage', function () {
    return view('addBeverage');
})->name('addBeverage');

Route::get('/addCategory', function () {
    return view('addCategory');
})->name('addCategory');

Route::get('/addUser', function () {
    return view('addUser');
})->name('addUser');


Route::get('/beverages', function () {
    return view('beverages');
})->name('beverages');



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


Route::get('/main', function () {
    return view('main');
})->name('main');


