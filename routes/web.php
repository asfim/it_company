<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GraphicsDesignController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Utility & Server Maintenance Routes
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return response()->make('
        <div style="font-family: sans-serif; padding: 40px; text-align: center;">
            <h2 style="color: #16a34a;">&#10004; All Caches Cleared Successfully!</h2>
            <p style="color: #475569;">Cleared: Optimize Cache, Application Cache, Config Cache, Route Cache, and Blade View Cache.</p>
            <a href="' . url('/') . '" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #22c55e; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600;">Go to Homepage</a>
        </div>
    ');
})->name('clear-cache');

Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        $output = Artisan::output();
        return response()->make('
            <div style="font-family: sans-serif; padding: 40px; text-align: center;">
                <h2 style="color: #16a34a;">&#10004; Storage Link Created Successfully!</h2>
                <pre style="background: #f1f5f9; padding: 15px; border-radius: 6px; display: inline-block; text-align: left; color: #334155;">' . htmlspecialchars($output ?: 'The [public/storage] link has been connected.') . '</pre><br>
                <a href="' . url('/') . '" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #22c55e; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600;">Go to Homepage</a>
            </div>
        ');
    } catch (\Throwable $e) {
        return response()->make('
            <div style="font-family: sans-serif; padding: 40px; text-align: center;">
                <h2 style="color: #ef4444;">&#10008; Error Creating Storage Link</h2>
                <pre style="background: #fef2f2; color: #b91c1c; padding: 15px; border-radius: 6px; display: inline-block; text-align: left;">' . htmlspecialchars($e->getMessage()) . '</pre><br>
                <a href="' . url('/') . '" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #64748b; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600;">Go to Homepage</a>
            </div>
        ', 500);
    }
})->name('storage-link');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap-{page}.xml', [SitemapController::class, 'chunk'])->whereNumber('page')->name('sitemap.chunk');

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
