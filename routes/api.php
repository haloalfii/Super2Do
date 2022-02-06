<?php

use App\Http\Controllers\ItemController;
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

Route::get('/item', [ItemController::class, 'index']);
Route::prefix('/item')->group(function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
    Route::get('/clear', [ItemController::class, 'destroyComplete']);
    Route::get('/completed', [ItemController::class, 'completed'])->name('completed');
    Route::get('/active', [ItemController::class, 'active'])->name('active');
    Route::get('/count', [ItemController::class, 'count'])->name('count');
    Route::get('/completed-all', [ItemController::class, 'completedAll']);
    Route::get('/actived-all', [ItemController::class, 'activeAll']);
});
