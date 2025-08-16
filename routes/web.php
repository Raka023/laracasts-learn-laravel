<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

Route::view('/', 'home')->name('home');

// Auth
Route::get('/register', [ RegisteredUserController::class, 'create' ])->name('register');
Route::post('/register', [ RegisteredUserController::class, 'store' ]);
Route::get('/login', [ SessionController::class, 'create' ])->name('login');
Route::post('/login', [ SessionController::class, 'store' ]);
Route::post('/logout', [ SessionController::class, 'destroy' ])->name('logout');

// Jobs Routes
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index' )->name('jobs.index');
    Route::get('/jobs/create', 'create' )->name('jobs.create');
    Route::get('/jobs/{job:id}', 'show' )->name('jobs.show');
    Route::get('/jobs/{job}/edit', 'edit' )->name('jobs.edit')->middleware('auth')->can('edit', 'job');
    Route::post('/jobs', 'store' )->middleware('auth');
    Route::patch('/jobs/{job}', 'update' );
    Route::delete('/jobs/{job}', 'destroy' );
});
//

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'create', 'show', 'edit', 'store', 'update', 'destroy'],
//     'except' => ['index', 'create', 'show', 'edit', 'store', 'update', 'destroy'],
// ]);

Route::view('/contact', 'contact')->name('contact');
