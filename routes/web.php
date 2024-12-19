<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('admin/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('admin/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    Route::get('admin/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('admin/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list'])->name('sub_category.list');
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
    Route::post('admin/sub_category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::put('admin/sub_category/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
    Route::delete('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');

    Route::get('admin/product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('admin/brand/list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('admin/brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::post('admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('admin/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    Route::get('admin/color/list', [ColorController::class, 'list'])->name('color.list');
    Route::get('admin/color/add', [ColorController::class, 'add'])->name('color.add');
    Route::post('admin/color/create', [ColorController::class, 'create'])->name('color.create');
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::put('admin/color/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('admin/color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');



    /*
        Route::get('admin/jquery', function(){
            return view('jquery');
        })->name('jquery');
        
        Route::get('admin/js', function(){
            return view('javascript');
        })->name('js');
        
        Route::get('admin/ajax', function(){
            return view('ajax');
        })->name('ajax');
    */
});


Route::get('admin', [AuthController::class, 'login_admin'])->name('login_admin');
Route::post('admin', [AuthController::class, 'auth_login_admin'])->name('auth_login_admin');
Route::get('admin/logout', [AuthController::class, 'logout_admin'])->name('logout_admin');
