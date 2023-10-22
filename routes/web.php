<?php

use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFeatureController;

Route::get('/', function () {
    return view('admin.layouts.home');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.dashboard');
});

// service

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');
Route::get('service/edit/{service}',[ServiceController::class, 'edit'])->name('service.edit');
Route::post('service/update/{service}',[ServiceController::class, 'update'])->name('service.update');
Route::get('service/delete/{service}',[ServiceController::class, 'destroy'])->name('service.delete');


// service feature
Route::get('/service/feature/create',[ServiceFeatureController::class,'create'])->name('service.feature.create');
Route::post('/service/feature/store',[ServiceFeatureController::class,'store'])->name('service.feature.store');


// projects

Route::get('/service/project/create',[ProjectController::class,'create'])->name('service.project.create');
Route::post('/service/project/store',[ProjectController::class,'store'])->name('service.project.store');


// category

Route::get('/post/category/create',[PostCategoryController::class,'create'])->name('post.category.create');
Route::post('/post/category/store',[PostCategoryController::class,'store'])->name('post.category.store');


Route::get('/login', function () {
    return view('login');
});
// Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');

require __DIR__.'/auth.php';
