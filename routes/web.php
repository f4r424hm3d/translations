<?php

use App\Http\Controllers\HomeController;
use App\Models\Language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

// Get all available languages from the database
$languages = Language::all()->pluck('code')->toArray();

// Default language (e.g., English) without language prefix
Route::get('/', [HomeController::class, 'openHomepage'])->name('site.home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('site.about');

// Generate routes dynamically for each language
foreach ($languages as $language) {
  Route::group(['prefix' => $language, 'where' => ['language' => $language]], function () use ($language) {
    Route::get('/', [HomeController::class, 'openHomepage'])->name("site.home.{$language}");
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name("site.about.{$language}");
  });
}
