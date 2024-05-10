<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\AdminController;
use  \App\Http\Controllers\Admin\StudentsController;
use \App\Http\Controllers\Admin\OtherController;
use \App\Http\Controllers\Admin\sukien\EventController;
use \App\Http\Controllers\Admin\User\LogoutController;
use App\Http\Middleware\Admin;
use \App\Http\Controllers\Admin\User\ProductController;
use App\Models\Product;

//login 
Route::get('login', [LoginController::class, 'index'])->name('login');


Route::get('/',[ProductController::class,'index']);
Route::post('admin/user/login/store',[LoginController::class, 'store']);
Route::get('/product/{id}', 'ProductController@show')->name('product.detail');

Route::get('/student/store/success',function () {
    return view('student.chucnang.dangbai');
})->name('success');
Route::post('/admin/create/store',[EventController::class, 'store']);
Route::get('/products/history', [ProductController::class, 'history'])->name('product.history');
Route::get('/events/history', [EventController::class, 'history'])->name('events.history');
// 
Route::get('/create/event',[EventController::class, 'index'])->name('create.event');

Route::get('/profile', 'ProfileController@index')->name('profile')->middleware('auth');

Route::get('/student/dangbai', function () {
    return view('student.chucnang.dangbai');
})->name('edit');

Route::get('/admin', function () {
    return view('Admin.admin');
})->name('admin');

Route::get('/student', function () {
    return view('student.students');
})->name('student');

Route::get('/external', function () {
    return view('other.other');
})->name('external');




//dường dẫn cho các phân quyền


Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');
Route::prefix('login')->group(function () {
    Route::get('/profile/student', [StudentsController::class, 'index'])->name('profile.student');
   
});

   
    Route::post('/student/store',[ProductController::class, 'store']);
   


    Route::get('/profile/external', [OtherController::class, 'index'])->name('profile.external');
   


    Route::prefix('admin')->group(function () {
        Route::get('/profile/admin', [AdminController::class, 'index'])->name('profile.admin');
       
    });
    