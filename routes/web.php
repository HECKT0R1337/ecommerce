<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;

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
});


Route::get('admin', [AuthController::class, 'login_admin'])->name('login_admin');
Route::post('admin', [AuthController::class, 'auth_login_admin'])->name('auth_login_admin');
Route::get('admin/logout', [AuthController::class, 'logout_admin'])->name('logout_admin');
