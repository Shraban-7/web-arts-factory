<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BrandPartnerController;
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





// Blog
Route::get('blog/show/{blogPost}',[BlogPostController::class, 'show'])->name('blog.show');

Route::get('/blogs', [BlogPostController::class, 'blog_api'])->name('blogs');


// service


Route::get('/services',[ServiceController::class,'service_api_list']);
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');


//brands

Route::get('/brands',[BrandPartnerController::class,'brands_api']);
