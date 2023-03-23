<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('activities', ActivityController::class, [
    'only' => ['index', 'show'],
]);

/**
 * This feels wrong.  I'd rather use 'activities?groupBy=type', but the resource response needs to be different.
 */
Route::get('activities:groupByType', [ActivityController::class, 'groupByType'])->name('activities.groupByType');
