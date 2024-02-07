<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::prefix('pages')->group(function () {
    Route::get('/', function () {
        return view('app');
    });
    // Route for top-level pages
    Route::get('{slug}', [PageController::class, 'show']);

    // Route for nested pages
    Route::prefix('{parentSlug}')->group(function () {
        Route::get('{childSlug}', [PageController::class, 'showNested']);
    });
});
