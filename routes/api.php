<?php

use App\Http\Controllers\PasteController;
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

Route::prefix('pastes')->group(function () {
    Route::post('', [PasteController::class, 'store']);//->middleware('filter.xss');
    Route::get('', [PasteController::class, 'getList']);
    Route::get('{hash}', [PasteController::class, 'getItemByHash']);
});
