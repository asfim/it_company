<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GraphicsDesignController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::post('/get-started', [PageController::class, 'getStartedSubmit'])->name('get-started.submit');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogShow'])->name('blog.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/graphics-design', [GraphicsDesignController::class, 'index'])->name('graphics-design.index');
    Route::get('/graphics-design/{section}/edit', [GraphicsDesignController::class, 'edit'])->name('graphics-design.edit');
    Route::put('/graphics-design/{section}', [GraphicsDesignController::class, 'update'])->name('graphics-design.update');

    // Generic Services Manager
    Route::get('/services/{service_key}', [App\Http\Controllers\Admin\ServiceSectionController::class, 'index'])->name('services.index');
    Route::get('/services/{service_key}/{section}/edit', [App\Http\Controllers\Admin\ServiceSectionController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service_key}/{section}', [App\Http\Controllers\Admin\ServiceSectionController::class, 'update'])->name('services.update');

    // Homepage Manager
    Route::get('/homepage/settings', [App\Http\Controllers\Admin\HomepageSettingsController::class, 'edit'])->name('homepage.settings.edit');
    Route::put('/homepage/settings', [App\Http\Controllers\Admin\HomepageSettingsController::class, 'update'])->name('homepage.settings.update');

    // Footer Settings
    Route::get('/footer/settings', [App\Http\Controllers\Admin\FooterSettingsController::class, 'editFooter'])->name('footer.settings.edit');
    Route::put('/footer/settings', [App\Http\Controllers\Admin\FooterSettingsController::class, 'updateFooter'])->name('footer.settings.update');
    Route::post('/footer/social-links', [App\Http\Controllers\Admin\FooterSettingsController::class, 'storeSocialLink'])->name('footer.social-links.store');
    Route::delete('/footer/social-links/{id}', [App\Http\Controllers\Admin\FooterSettingsController::class, 'destroySocialLink'])->name('footer.social-links.destroy');

    // Contact Settings
    Route::get('/contact/settings', [App\Http\Controllers\Admin\FooterSettingsController::class, 'editContact'])->name('contact.settings.edit');
    Route::put('/contact/settings', [App\Http\Controllers\Admin\FooterSettingsController::class, 'updateContact'])->name('contact.settings.update');

    Route::resource('/homepage/services', App\Http\Controllers\Admin\HomepageServiceController::class)->except(['show'])->names('homepage.services');
    Route::resource('/homepage/wcu', App\Http\Controllers\Admin\HomepageWcuController::class)->only(['index', 'edit', 'update'])->names('homepage.wcu');
    Route::resource('/homepage/process', App\Http\Controllers\Admin\HomepageProcessController::class)->only(['index', 'edit', 'update'])->names('homepage.process');
    Route::resource('/homepage/products', App\Http\Controllers\Admin\HomepageProductController::class)->except(['show'])->names('homepage.products');
    Route::resource('/homepage/technologies', App\Http\Controllers\Admin\HomepageTechnologyController::class)->except(['show'])->names('homepage.technologies');
    Route::resource('/homepage/team', App\Http\Controllers\Admin\HomepageTeamController::class)->except(['show'])->names('homepage.team');
    Route::resource('/homepage/testimonials', App\Http\Controllers\Admin\HomepageTestimonialController::class)->except(['show'])->names('homepage.testimonials');

    // Get Started Submissions
    Route::get('/get-started', [App\Http\Controllers\Admin\GetStartedSubmissionController::class, 'index'])->name('get-started.index');
    Route::delete('/get-started/{id}', [App\Http\Controllers\Admin\GetStartedSubmissionController::class, 'destroy'])->name('get-started.destroy');

    // Dynamic Blog CRUD
    Route::resource('/blogs', \App\Http\Controllers\Admin\BlogController::class)->except(['show'])->names('blogs');
});

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/web-application', [PageController::class, 'webApplication'])->name('web-app');
    Route::get('/web-development', [PageController::class, 'webDevelopment'])->name('web-dev');
    Route::get('/software', [PageController::class, 'software'])->name('software');
    Route::get('/digital-marketing', [PageController::class, 'digitalMarketing'])->name('marketing');
    Route::get('/graphics-design', [PageController::class, 'graphicsDesign'])->name('graphics');
    Route::get('/ui-ux-design', [PageController::class, 'uiUxDesign'])->name('ui-ux');
});
