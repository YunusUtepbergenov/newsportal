<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Routes
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//Category Links
Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('admin/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');

//SubCategory Links
Route::resource('admin/subcategory', SubcategoryController::class);
