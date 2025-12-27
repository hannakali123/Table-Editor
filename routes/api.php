<?php

use App\Http\Controllers\jsonApiController;
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
Route::get('Json',[jsonApiController::class, 'getJSon'] );
Route::post('Json',[jsonApiController::class, 'add'] );
Route::post('JsonBulk',[jsonApiController::class, 'bulkupload'] );
Route::put('Json/{id}',[jsonApiController::class, 'dataupdate']);
Route::delete('Json/{id}',[jsonApiController::class, 'datadelete']);

