<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryIngredientController;
use App\Http\Controllers\DailystockController;
use App\Http\Controllers\IngredientCategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::view('index', 'Admin.index');
Route::view('login','login');
Route::post('login',[UserController::class,'login']);
Route::view('dashboard','Admin.index');
Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});



Route::controller(LocationController::class)->group(function(){
    Route::get('Location/add','addLocation');
    Route::post('Location/add','store');
    Route::get('Location/list','list');
    Route::get('Location/delete/{id}','delete');
    Route::get('Location/update/{id}','update');
    Route::post('Location/change/{id}','change')->name('change');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('Category/add','addCategory');
    Route::post('Category/add','store');
    Route::get('Category/list','list');
    Route::get('Category/delete/{id}','delete');
    Route::get('Category/update/{id}','update');
    Route::post('Category/change/{id}','change')->name('change');
});

Route::controller(IngredientController::class)->group(function(){
    Route::get('Ingredient/add','add');
    Route::post('Ingredient/add','store');
    Route::get('Ingredient/list','list');
    Route::get('Ingredient/delete/{id}','delete');
    Route::get('Ingredient/update/{id}','update');
    Route::post('Ingredient/change/{id}','change')->name('change');
});
Route::controller(DailystockController::class)->group(function(){
    Route::get('Daily_stock/add','add');
    Route::post('Daily_stock/add','store');
    Route::get('Daily_stock/list','list');
    Route::get('Daily_stock/delete/{id}','delete');
});

Route::controller(productController::class)->group(function(){
    Route::get('Product/add','add');
    Route::post('Product/add','store');
    Route::get('Product/list','list');
});

Route::controller(UserController::class)->group(function(){
    Route::get('profile/view/{id}','view');
    Route::post('profile/edit/{id}','edit')->name('update_user');
    Route::post('profile/update-password/{id}','password')->name('update_password');
});

Route::controller(IngredientCategoryController::class)->group(function(){
    Route::get('Ingredientcategory/add','add');
    Route::post('Ingredientcategory/add','store');
    Route::get('Ingredientcategory/list','list');
    Route::get('Ingredientcategory/update/{id}','update');
    Route::post('Ingredientcategory/change/{id}','change')->name('change');
    Route::get('Ingredientcategory/delete/{id}','delete');
});



