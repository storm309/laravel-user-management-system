<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/secure',function(){
    if(request()->secure()){
        return "This is a secure request";
    }
    return "Use HTTPS to access this route";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::domain('shivam.com')->group(function () {
    Route::get('/', function () {
        return "Welcome to the admin dashboard";
    });
    Route::get('/dashboard', function () {
        return "Welcome to the admin dashboard";
    });
});

require __DIR__.'/auth.php';
