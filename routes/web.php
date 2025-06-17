<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MigrationController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\ServiceController as WebServiceController;

require __DIR__ . '/admin.php';

Route::get('/run-migrate', [MigrationController::class, 'runAll']);
Route::get('/run-specific-migration', [MigrationController::class, 'runSpecific']);
Route::get('/clear', [MigrationController::class, 'clearAll']);
 
Route::middleware('guest.home')->group(function () {
    Route::get('/', function () {
        return view('web.auth.login');
    })->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('register', function () {
        return view('web.auth.register');
    })->name('register');
    Route::get('provider/register', function () {
        return view('web.auth.Providerregister');
    })->name('provider.register');
    Route::post('register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('feed', [HomeController::class, 'index'])->name('feed');
    Route::post('posts-store', [PostController::class, 'store'])->name('post.store');
    Route::get('profile',[AuthController::class, 'profile'])->name('profile');
    Route::post('profile-update',[AuthController::class, 'profile_update'])->name('profile.update');
    Route::get('service-providers',[WebServiceController::class, 'index'])->name('services.index');
    Route::get('provider-services/{id}',[WebServiceController::class, 'provider_service'])->name('provider.services');
    Route::get('user-profile/{id}', [HomeController::class, 'user_profile'])->name('users.profile');
    Route::post('/like-post', [PostController::class, 'likePost']);
    Route::post('/comment-post', [PostController::class, 'commentPost']);
    Route::get('/single_post/{id}', [PostController::class, 'single_post'])->name('single.post');
});
