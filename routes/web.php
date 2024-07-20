<?php

use App\Http\Controllers\BeveragesController;
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
Route::get('addUser', [Controller::class,'addForm'])->name('addUser');
Route::post('addNewUser',[Controller::class,'store'])->name('addNewUser');
Route::get('categories', [CategoriesController::class,'index'])->name('categories');
Route::get('addCategory', [CategoriesController::class,'create'])->name('addCategory');
Route::post('addCategories', [CategoriesController::class,'store'])->name('addCategories');
Route::get('editCategory/{id}', [CategoriesController::class,'edit'])->name('editCategory');
Route::put('updateCategories/{id}',[CategoriesController::class,'update'])->name('updateCategories');
Route::delete('deleteCategory',[CategoriesController::class,'destroy'])->name('deleteCategory');
Route::get('beverages', [BeveragesController::class,'index'])->name('beverages');
Route::post('addNewBeverage', [BeveragesController::class,'store'])->name('addNewBeverage');
Route::get('addBeverage', [BeveragesController::class,'show'])->name('addBeverage');
Route::get('editBeverage/{id}', [BeveragesController::class,'edit'])->name('editBeverage');
Route::put('updateBeverages/{id}',[BeveragesController::class,'update'])->name('updateBeverages');
Route::delete('deleteBeverage',[BeveragesController::class,'destroy'])->name('deleteBeverage');


Route::get('/messages', function () {
    return view('messages');
})->name('messages');

Route::get('/showMessage', function () {
    return view('showMessage');
})->name('showMessage');

Route::get('/main', function () {
    return view('main');
})->name('main');


