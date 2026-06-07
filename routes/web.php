<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/web-application', [PageController::class, 'webApplication'])->name('web-app');
    Route::get('/web-development', [PageController::class, 'webDevelopment'])->name('web-dev');
    Route::get('/software', [PageController::class, 'software'])->name('software');
    Route::get('/digital-marketing', [PageController::class, 'digitalMarketing'])->name('marketing');
    Route::get('/graphics-design', [PageController::class, 'graphicsDesign'])->name('graphics');
    Route::get('/ui-ux-design', [PageController::class, 'uiUxDesign'])->name('ui-ux');
});
