<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::middleware('App\Http\Middleware\Authenticate')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
    });
    Route::prefix('notif')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
        Route::post('/read/{id}', [NotificationController::class, 'read'])->name('notification.read');
        Route::post('/readall', [NotificationController::class, 'readAll'])->name('notification.readAll');
    }); 
});