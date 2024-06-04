<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\loginadmin\AdminloginController;
use  \App\Http\Controllers\Admin\StudentsController;
use \App\Http\Controllers\Admin\OtherController;
use \App\Http\Controllers\Admin\sukien\EventController;
use \App\Http\Controllers\Admin\User\LogoutController;
use App\Http\Middleware\Admin;
use \App\Http\Controllers\Admin\User\ProductController;
use App\Models\Product;
use App\Http\Controllers\Admin\Create\CreateController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\App;

//login 
Route::get('login', [LoginController::class, 'index'])->name('login');


Route::get('/', [ProductController::class, 'index'])->name('home');
Route::post('admin/user/login/store', [LoginController::class, 'store']);

Route::get('/student/store/success', function () {
    return view('student.chucnang.dangbai');
})->name('success');


Route::post('/admin/create/store', [EventController::class, 'store']);




// tạo event 
Route::get('/create/event', [EventController::class, 'index'])->name('create.event');
Route::get('/events/history', [EventController::class, 'history'])->name('events.history');


Route::get('/profile', 'ProfileController@index')->name('profile')->middleware('auth');



Route::get('/student/dangbai', function () {
    return view('student.chucnang.dangbai');
})->name('edit');
Route::get('/student/sukien',[EventController::class, 'createExhibitionEntry'])->name('sukien');
Route::get('/external', function () {
    return view('other.other');
})->name('external');

//dường dẫn cho các phân quyền
Route::post('/student/store', [ProductController::class, 'store']);
Route::post('/student/sukien', [EventController::class, 'storeExhibition'])->name('storeExhibition');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::prefix('login')->group(function () {
    Route::get('/profile/student', [StudentsController::class, 'index'])->name('profile.student');
    Route::get('/profile/external', [OtherController::class, 'index'])->name('profile.external');

    Route::prefix('admin')->group(function () {
        Route::get('/profile/admin', [AdminController::class, 'index'])->name('profile.admin');
    });
});

Route::get('/login/admin', [AdminloginController::class, 'index'])->name('login.admin');
Route::post('/admin/login/store', [AdminloginController::class, 'store']);
Route::get('/detail', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/profile/student',[ProductController::class, 'showStudentPage']);
//sửa xóa và update sản phẩm
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route::get('/product/{id}', 'ProductController@show')->name('product.detail');
Route::get('/products/history', [ProductController::class, 'history'])->name('product.history');

Route::get('/event', [CreateController::class, 'Event'])->name('profile.Event');
Route::get('/create-account', [CreateController::class, 'index'])->name('create.account');
Route::post('/create/store', [CreateController::class, 'store'])->name('register');
Route::post('/exhibition-entries/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.exhibition.entries.status');
// Route::get('/', [EventController::class, 'indexa']);
Route::get('/entries/{id}', [CreateController::class, 'show'])->name('entries.show');
// Route::post('/events', [App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('events.create');
// Route::get('/notifications/{notification}/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/entries/{id}/like', [LikeController::class, 'like'])->name('entries.like');
Route::post('/entries/{id}/unlike', [LikeController::class, 'unlike'])->name('entries.unlike');
Route::post('/join-event', [EventController::class, 'join'])->name('join.event');
Route::get('/note', function () {
    return view('note');
})->name('note');

Route::get('/event/student', [EventController::class, 'show']);
Route::get('/entries/{id}', [EventController::class, 'showa'])->name('entries.show');
Route::post('/entries/{id}/comment', [EventController::class, 'storeComment'])->name('entries.comment');

Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/admin/history', [EventController::class, 'Eventhistory'])->name('admin.history');

Route::delete('/admin/event/destroy/{id}', [EventController::class, 'destroyForAdmin'])->name('admin.event.destroy');

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/get-ticket-price', [TicketController::class, 'getTicketPrice'])->name('get-ticket-price');
Route::get('/prices', [PriceController::class, 'index'])->name('admin.prices.index');
Route::put('/prices/update', [PriceController::class, 'update'])->name('admin.prices.update');

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/success', [TicketController::class, 'success'])->name('tickets.success');

Route::get('/tickets/cart', [TicketController::class, 'cart'])->name('tickets.cart');
Route::delete('/tickets/cart/{index}', [TicketController::class, 'removeFromCart'])->name('tickets.cart.remove');
