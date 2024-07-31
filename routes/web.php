<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlipbookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


// for clear-cache
Route::get('/cc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('view:cache');
    Artisan::call('route:clear');
    // Artisan::call('route:cache');

    echo "Cache Cleared";
});


require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

        Route::get('/flipbook-setting', [FlipbookController::class, 'index'])->name('pdfSlide.index');
        // routes/web.php
     

        Route::post('/flipbook-setting-store', [FlipbookController::class, 'store'])->name('pdfSlide.store');
        Route::get('/flipbook-setting/edit/{id}', [FlipbookController::class, 'edit'])->name('pdfSlide.edit');
        Route::get('/flipbook-setting/create', [FlipbookController::class, 'create'])->name('pdfSlide.create');

        Route::post('/flipbook-setting-update', [FlipbookController::class, 'update'])->name('pdfSlide.update');
    });
});
Route::get('/{slug}', [FlipbookController::class, 'showBySlug'])->name('pdfSlide.showBySlug');

