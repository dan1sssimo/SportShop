<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
<<<<<<< HEAD
use App\Http\Controllers\CategoryController;
=======
use App\Http\Controllers\ProductController;
>>>>>>> origin/prelast

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
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
<<<<<<< HEAD
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/{id}', 'show_subcategory')->name('category_id');
    Route::get('/subcategory/{id}', 'show_subsubcategory')->name('subcategory_id');
    Route::get('/category', 'index')->name('category_all');
});



=======
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

//Products All route
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/add', 'ProductAdd')->name('product.add');
    Route::post('/product/store', 'ProductStore')->name('product.store');
});

>>>>>>> origin/prelast
require __DIR__ . '/auth.php';
