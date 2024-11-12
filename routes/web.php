<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return redirect()->route('login');
});
//Return the login view
Route::get('/login', [UserController::class, 'form_login'])->name('login');
Route::post('/login', [UserController::class, 'login']);

//Return the login and register view
Route::get('/register', [UserController::class, 'form_register']);
Route::post('/register/traitement', [UserController::class, 'form_traitement']);
Route::post('/login/traitement', [UserController::class, 'login_form']);
//Return the dashboard view
Route::get('/dashboard', function(){ return view('espacemembre'); });

//*************************Return dashbord and form view */
Route::get('/addsender', function () {
    return view('form');
})->name('form');
Route::post('/addsender/store',[RegisterController::class, 'store']);
Route::get('/dashboard', [RegisterController::class, 'dashboard']);

Route::get('/searchsender', [SearchController::class, 'searchsender']);
Route::get('/searchsender', [SearchController::class, 'dashboard']);
Route::get('/searchsender/{id}', [SearchController::class, 'show']);


