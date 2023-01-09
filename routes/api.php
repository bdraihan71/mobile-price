<?php

use App\Http\Controllers\backend\HighlightGeneratorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/slug_generator', [App\Http\Controllers\backend\SlugGenerateApiController::class, 'slugGenerator']);
// Route::get('/highlight_generator', [HighlightGeneratorController::class, 'highlightGenerator']);
