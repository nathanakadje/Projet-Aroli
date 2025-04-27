<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CountryController;


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

Route::get('users', [RegisterController::class, 'index']);
Route::get('users/{id}', [RegisterController::class, 'show']);

Route::post('addnew', [RegisterController::class, 'store']);
// Routes pour les API utilisées par Select2
Route::get('/api/operators', [OperatorController::class, 'index']);
Route::get('/api/countries', [CountryController::class, 'index']);
