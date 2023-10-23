<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BrandPartnerController;
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
Route::get('/service/feature/list',[ServiceFeatureController::class,'index'])->name('service.feature.list');
Route::get('/service/feature/create',[ServiceFeatureController::class,'create'])->name('service.feature.create');
Route::post('/service/feature/store',[ServiceFeatureController::class,'store'])->name('service.feature.store');
Route::get('/service/feature/edit/{serviceFeature}',[ServiceFeatureController::class,'edit'])->name('service.feature.edit');
Route::post('/service/feature/update/{serviceFeature}',[ServiceFeatureController::class,'update'])->name('service.feature.update');
Route::get('/service/feature/delete/{serviceFeature}',[ServiceFeatureController::class,'destroy'])->name('service.feature.delete');


// projects

Route::get('/service/project/list',[ProjectController::class,'index'])->name('service.project.list');
Route::get('/service/project/create',[ProjectController::class,'create'])->name('service.project.create');
Route::post('/service/project/store',[ProjectController::class,'store'])->name('service.project.store');
Route::get('/service/project/edit/{project}',[ProjectController::class,'edit'])->name('service.project.edit');
Route::post('/service/project/update/{project}',[ProjectController::class,'update'])->name('service.project.update');
Route::get('/service/project/delete/{project}',[ProjectController::class,'destroy'])->name('service.project.delete');


// category

Route::get('/blog/post/category/create',[PostCategoryController::class,'create'])->name('post.category.create');
Route::post('/blog/post/category/store',[PostCategoryController::class,'store'])->name('post.category.store');


// blog

Route::get('/blog/post/create',[BlogPostController::class,'create'])->name('blog.post.create');
Route::post('/blog/post/store',[BlogPostController::class,'store'])->name('blog.post.store');

// brand partner

Route::get('/brand/list',[BrandPartnerController::class,'index'])->name('brand.list');
Route::get('/brand/create',[BrandPartnerController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandPartnerController::class,'store'])->name('brand.store');
Route::get('/brand/edit/{brand}',[BrandPartnerController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{brand}',[BrandPartnerController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{brand}',[BrandPartnerController::class,'destroy'])->name('brand.delete');

Route::get('/login', function () {
    return view('login');
});
// Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');

require __DIR__.'/auth.php';
