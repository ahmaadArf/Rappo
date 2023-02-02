<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\NeewController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProcesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestimonialController;


Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/',[AdminController::class ,'index'])->name('index');

    Route::get('abouts/trash',[AboutController::class ,'trash'])->name('abouts.trash');
    Route::get('abouts/{id}/restore',[AboutController::class ,'restore'])->name('abouts.restore');
    Route::delete('abouts/{id}/forcedelete',[AboutController::class ,'forcedelete'])->name('abouts.forcedelete');
    Route::resource('abouts', AboutController::class);

    Route::get('proces/trash',[ProcesController::class ,'trash'])->name('proces.trash');
    Route::get('proces/{id}/restore',[ProcesController::class ,'restore'])->name('proces.restore');
    Route::delete('proces/{id}/forcedelete',[ProcesController::class ,'forcedelete'])->name('proces.forcedelete');
    Route::resource('proces', ProcesController::class);

    Route::get('testimonials/trash',[TestimonialController::class ,'trash'])->name('testimonials.trash');
    Route::get('testimonials/{id}/restore',[TestimonialController::class ,'restore'])->name('testimonials.restore');
    Route::delete('testimonials/{id}/forcedelete',[TestimonialController::class ,'forcedelete'])->name('testimonials.forcedelete');
    Route::resource('testimonials', TestimonialController::class);

    Route::get('neews/trash',[NeewController::class ,'trash'])->name('neews.trash');
    Route::get('neews/{id}/restore',[NeewController::class ,'restore'])->name('neews.restore');
    Route::delete('neews/{id}/forcedelete',[NeewController::class ,'forcedelete'])->name('neews.forcedelete');
    Route::resource('neews', NeewController::class);

    Route::get('projects/trash',[ProjectController::class ,'trash'])->name('projects.trash');
    Route::get('projects/{id}/restore',[ProjectController::class ,'restore'])->name('projects.restore');
    Route::delete('projects/{id}/forcedelete',[ProjectController::class ,'forcedelete'])->name('projects.forcedelete');
    Route::resource('projects',ProjectController::class);
});


Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('/about',[SiteController::class,'about'])->name('site.about');
Route::get('/service',[SiteController::class,'service'])->name('site.service');
Route::get('/pricing',[SiteController::class,'pricing'])->name('site.pricing');
Route::get('/project',[SiteController::class,'project'])->name('site.project');
Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');
Route::post('/contact-data',[SiteController::class,'contact_data'])->name('site.contact_data');
Route::get('/single-project/{id}',[SiteController::class,'single_project'])->name('site.single_project');
