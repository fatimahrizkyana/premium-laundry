<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/transaction', function () {
    return view('admin.transaction.index');
});

Route::get('/location', function () {
    return view('admin.location.index');
});

Route::get('/reports', function () {
    return view('admin.reports.index');
});

Route::get('/admin/login', [AuthController::class, 'indexAdmin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'authAdmin'])->name('admin.auth');
Route::get('/admin/logout', [AuthController::class, 'logoutAdmin'])->name('logout');

Route::group(['middleware' => ['auth.employee'], 'prefix' => 'admin', 'as' => 'admin.'], function () {   
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');  

    Route::resource('employee', EmployeeController::class);

    Route::resource('member', MemberController::class);

    Route::resource('outlet', OutletController::class);    

    Route::resource('product', ProductController::class);
Route::get('/');
});
