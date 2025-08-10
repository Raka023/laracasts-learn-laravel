<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::view('/', 'home');

// Jobs Routes
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index' );
    Route::get('/jobs/create', 'create' );
    Route::get('/jobs/{job:id}', 'show' );
    Route::get('/jobs/{job}/edit', 'edit' );
    Route::post('/jobs', 'store' );
    Route::patch('/jobs/{job}', 'update' );
    Route::delete('/jobs/{job}', 'delete' );
});
//

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'create', 'show', 'edit', 'store', 'update', 'destroy'],
//     // 'except' => ['index', 'create', 'show', 'edit', 'store', 'update', 'destroy'],
// ]);

Route::view('/contact', 'contact');
