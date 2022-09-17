<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout'); //logout
    Route::get('/admin/profile', 'Profile')->name('admin.profile'); // profile
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile'); //editProfile
    Route::post('/store/profile', 'StoreProfile')->name('store.profile'); //Profile
    Route::get('/change/password', 'ChangePassword')->name('change.password');// changePass
    Route::post('/update/password', 'UpdatePassword')->name('update.password'); // updatePass
});

//Products All route
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/add', 'ProductAdd')->name('product.add'); //upload view
    Route::post('/product/store', 'ProductStore')->name('product.store'); //send form
    Route::post('/product/subcategory', 'SubCategoryStore')->name('product.subcategory');  // ajax form
    Route::post('/product/subsubcategory', 'SubSubCategoryStore')->name('product.subsubcategory');  // ajax form
});
require __DIR__ . '/auth.php';
