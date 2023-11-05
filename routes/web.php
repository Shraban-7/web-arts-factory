<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\SliderItemController;
use App\Http\Controllers\BrandPartnerController;
use App\Http\Controllers\PostCategoryController;
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
Route::get('service/edit/{service}',[ServiceController::class, 'show'])->name('service.show');
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
Route::get('/blog/post/category/list',[PostCategoryController::class,'index'])->name('post.category.list');
Route::get('/blog/post/category/create',[PostCategoryController::class,'create'])->name('post.category.create');
Route::post('/blog/post/category/store',[PostCategoryController::class,'store'])->name('post.category.store');
Route::get('/blog/post/category/edit/{category}',[PostCategoryController::class,'edit'])->name('post.category.edit');
Route::post('/blog/post/category/update/{category}',[PostCategoryController::class,'update'])->name('post.category.update');
Route::get('/blog/post/category/delete/{category}',[PostCategoryController::class,'destroy'])->name('post.category.delete');


// blog

Route::get('/blog/list',[BlogPostController::class,'index'])->name('blog.list');
Route::get('/blog/post/create',[BlogPostController::class,'create'])->name('blog.post.create');
Route::post('/blog/post/store',[BlogPostController::class,'store'])->name('blog.post.store');
Route::get('blog/edit/{blogPost}',[BlogPostController::class, 'show'])->name('blog.show');
Route::get('blog/edit/{blogPost}',[BlogPostController::class, 'edit'])->name('blog.edit');
Route::post('blog/update/{blogPost}',[BlogPostController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{blogPost}',[BlogPostController::class, 'destroy'])->name('blog.delete');





// brand partner

Route::get('/brand/list',[BrandPartnerController::class,'index'])->name('brand.list');
Route::get('/brand/create',[BrandPartnerController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandPartnerController::class,'store'])->name('brand.store');
Route::get('/brand/edit/{brand}',[BrandPartnerController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{brand}',[BrandPartnerController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{brand}',[BrandPartnerController::class,'destroy'])->name('brand.delete');


//slider

Route::get('slider_item/list',[SliderItemController::class, 'index'])->name('slider_item.list');
Route::get('slider_item/create',[SliderItemController::class, 'create'])->name('slider_item.create');
Route::post('slider_item/store',[SliderItemController::class, 'store'])->name('slider_item.store');
Route::get('slider_item/edit/{sliderItem}',[SliderItemController::class, 'edit'])->name('slider_item.edit');
Route::post('slider_item/update/{sliderItem}',[SliderItemController::class, 'update'])->name('slider_item.update');
Route::get('slider_item/delete/{sliderItem}',[SliderItemController::class, 'destroy'])->name('slider_item.delete');

// Carousel

Route::get('carousel/list',[CarouselController::class, 'index'])->name('carousel.list');
Route::get('carousel/create',[CarouselController::class, 'create'])->name('carousel.create');
Route::post('carousel/store',[CarouselController::class, 'store'])->name('carousel.store');
Route::get('carousel/edit/{carousel}',[CarouselController::class, 'edit'])->name('carousel.edit');
Route::post('carousel/update/{carousel}',[CarouselController::class, 'update'])->name('carousel.update');
Route::get('carousel/delete/{carousel}',[CarouselController::class, 'destroy'])->name('carousel.delete');


//blog



Route::get('/login', function () {
    return view('login');
});
// Route::post('service/store',[ServiceController::class, 'store'])->name('service.store');

require __DIR__.'/auth.php';
