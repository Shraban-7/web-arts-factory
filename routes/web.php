<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;



Route::get('/', function () {
    return view('admin.layouts.home');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.dashboard');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');
Route::get('service/edit/{service}',[ServiceController::class, 'edit'])->name('service.edit');
Route::post('service/update/{service}',[ServiceController::class, 'update'])->name('service.update');
Route::get('service/delete/{service}',[ServiceController::class, 'destroy'])->name('service.delete');

Route::get('/login', function () {
    return view('login');
});
// Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');

require __DIR__.'/auth.php';
