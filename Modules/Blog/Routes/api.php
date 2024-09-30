<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Api\BlogController;

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

Route::middleware('auth:api')->get('/blog/', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->prefix('blog')->group(function() {
    Route::get('all-blogs', [BlogController::class, 'index']);
    Route::get('show/{id}', [BlogController::class, 'show']);
    Route::post('create', [BlogController::class, 'store']);
    Route::delete('delete/{id}', [BlogController::class, 'destroy']);
    Route::put('update/{id}', [BlogController::class, 'update']);
});

