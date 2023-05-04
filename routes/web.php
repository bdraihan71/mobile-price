<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\HighlightGeneratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MobileBrandController;
use App\Http\Controllers\Backend\MobileModelController;
use App\Http\Controllers\Backend\SlugGenerateApiController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\RSSFeedController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/mobile', function () {
//     return view('frontend.pages.single_mobile');
// });

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//view cache
Route::get('/view-cache', function()
{
    Artisan::call('view:cache');
    echo 'view cached';
});


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('brand', [HomeController::class, 'brand'])->name('brand');
Route::get('brand/{brand}', [HomeController::class, 'brandByName'])->name('brand.name');
Route::get('model/{model_slug}', [HomeController::class, 'modelByName'])->name('model.name');
Route::get('price-range/{price_slug}', [HomeController::class, 'priceRange'])->name('price.range');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/privacy_policy', [HomeController::class, 'privacyPolicy'])->name('privacyandpolicy');
Route::get('/mobile_search/{mobile}', [HomeController::class, 'mobileSearch']);


Route::get('/slug_generator', [SlugGenerateApiController::class, 'slugGenerator']);
Route::get('/highlight_generator', [HighlightGeneratorController::class, 'highlightGenerator']);



// Route::get('/test', function () {
//     return view('Backend.app');
// });



// Auth::routes();

 
// Login Routes
Route::get('/my_home_login', [AdminController::class, 'showLoginForm']);
Route::post('/my_home_login', [AdminController::class, 'login'])->name('login');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    // register and  Routes
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/register', [AdminController::class, 'register'])->name('register');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/message', [AdminController::class, 'message'])->name('message');

    Route::prefix('mobile')->group(function () {
        Route::prefix('brand')->group(function () {
            Route::get('/', [MobileBrandController::class, 'index'])->name('mobile.brand.index');
            Route::post('/', [MobileBrandController::class, 'store'])->name('mobile.brand.store');
            Route::get('/edit/{id}', [MobileBrandController::class, 'edit'])->name('mobile.brand.edit');
            Route::put('/update/{id}', [MobileBrandController::class, 'update'])->name('mobile.brand.update');
            Route::delete('/{id}', [MobileBrandController::class, 'destroy'])->name('mobile.brand.destroy');
        });
        Route::prefix('model')->group(function () {
            Route::get('/create', [MobileModelController::class, 'create'])->name('mobile.model.create');
            Route::get('/create/create_by_json', [MobileModelController::class, 'createByJson'])->name('mobile.model.create_by_json');
            Route::get('/', [MobileModelController::class, 'index'])->name('mobile.model.index');
            Route::get('/{id}', [MobileModelController::class, 'view'])->name('mobile.model.view');
            Route::post('/', [MobileModelController::class, 'store'])->name('mobile.model.store');
            Route::post('/by_json', [MobileModelController::class, 'storeByJson'])->name('mobile.model.store.json');
            Route::get('/edit/{id}', [MobileModelController::class, 'edit'])->name('mobile.model.edit');
            Route::put('/update/{id}', [MobileModelController::class, 'update'])->name('mobile.model.update');
            Route::delete('/{id}', [MobileModelController::class, 'destroy'])->name('mobile.model.destroy');
            Route::post('/published/{id}', [MobileModelController::class, 'published'])->name('mobile.model.published');

            Route::post('/price', [MobileModelController::class, 'storePrice'])->name('store.price');
            Route::delete('/price/{id}', [MobileModelController::class, 'destoryPrice'])->name('delete.price');
        });
    });
});


Route::get('sitemap.xml', [SitemapController::class, 'index']);
Route::get('feed', [RSSFeedController::class, 'index']);
Route::get('/ads.txt',function(){
    header('Location: https://srv.adstxtmanager.com/49460/mobilekhor.com');
    exit;
 });

// Route::get('/admin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('admin');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


