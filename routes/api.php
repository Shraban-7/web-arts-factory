<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFeatureController;
use App\Http\Controllers\SliderItemController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TechnologyController;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('category/store',[PostCategoryController::class, 'store'])->name('category.store');
Route::post('service_feature/store',[ServiceFeatureController::class, 'store'])->name('service.feature.store');
Route::post('project/store',[ProjectController::class, 'store'])->name('project.store');
Route::post('technology/store',[TechnologyController::class, 'store'])->name('technology.store');
Route::post('blog/store',[BlogPostController::class, 'store'])->name('blog.post.store');
Route::post('slider/store',[SliderItemController::class, 'store'])->name('slide.store');
// Route::post('/categories', [PostCategoryController::class, 'store']);
// Route::post('/categories', [PostCategoryController::class, 'store']);


Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::get('/home', function () {
    return ['Laravel' => app()->version()];
});


// Faq
Route::post('faq/store',[FaqController::class, 'store'])->name('faq.store');
Route::get('faq/edit/{faq}',[FaqController::class, 'edit'])->name('faq.edit');
Route::post('faq/update/{faq}',[FaqController::class, 'update'])->name('faq.update');
Route::post('faq/delete/{faq}',[FaqController::class, 'destroy'])->name('faq.delete');


//Tags
Route::post('tag/store',[PostTagController::class, 'store'])->name('tag.store');
Route::get('tag/edit/{postTag}',[PostTagController::class, 'edit'])->name('tag.edit');
Route::post('tag/update/{postTag}',[PostTagController::class, 'update'])->name('tag.update');
Route::post('tag/delete/{postTag}',[PostTagController::class, 'destroy'])->name('tag.delete');


// system

Route::post('system/store',[SystemController::class, 'store'])->name('system.store');
Route::get('system/edit/{system}',[SystemController::class, 'edit'])->name('system.edit');
Route::post('system/update/{system}',[SystemController::class, 'update'])->name('system.update');
Route::get('system/delete/{system}',[SystemController::class, 'destroy'])->name('system.delete');


// Carousel

Route::post('carousel/store',[CarouselController::class, 'store'])->name('carousel.store');
Route::get('carousel/edit/{carousel}',[CarouselController::class, 'edit'])->name('carousel.edit');
Route::post('carousel/update/{carousel}',[CarouselController::class, 'update'])->name('carousel.update');
Route::get('carousel/delete/{carousel}',[CarouselController::class, 'update'])->name('carousel.delete');
Route::post('slider_item/store',[SliderItemController::class, 'store'])->name('slider_item.store');
Route::get('slider_item/edit/{sliderItem}',[SliderItemController::class, 'edit'])->name('slider_item.edit');
Route::post('slider_item/update/{sliderItem}',[SliderItemController::class, 'update'])->name('slider_item.update');
Route::get('slider_item/delete/{sliderItem}',[SliderItemController::class, 'destroy'])->name('slider_item.delete');

// Blog
Route::post('blog/store',[BlogPostController::class, 'store'])->name('blog.post.store');
Route::get('blog/show/{blogPost}',[BlogPostController::class, 'show'])->name('blog.show');
Route::get('blog/edit/{blogPost}',[BlogPostController::class, 'edit'])->name('blog.edit');
Route::post('blog/update/{blogPost}',[BlogPostController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{blogPost}',[BlogPostController::class, 'destroy'])->name('blog.delete');
Route::get('/blogs', [BlogPostController::class, 'index'])->name('blogs');


// service



Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');