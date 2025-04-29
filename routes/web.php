<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;

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

Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');

//Return the login and register view
Route::get('/register', [UserController::class, 'form_register']);
Route::post('/register/traitement', [UserController::class, 'form_traitement']);
Route::post('/login/traitement', [UserController::class, 'login_form']);
//Return the dashboard view
Route::get('/dashboard', function(){ return view('espacemembre'); });

//*************************Return dashbord and form view ***************************************/
Route::get('/addsender', function () {
    return view('form');
})->name('form');
Route::post('/addsender/store',[RegisterController::class, 'store']);

//*************************Search route ***************************************/

Route::post('/search', [SearchController::class, 'searchs'])->name('search.searchs');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/registry/{id}', [SearchController::class, 'getRegistryDetails']);
Route::get('/search/{type}', [SearchController::class, 'export'])->name('search.export');
Route::get('/operators', [SearchController::class, 'getOperators'])->name('get.operators');
Route::get('/countries', [SearchController::class, 'getCountries'])->name('get.countries');

// ***********************************************Actions Routes***********************************************
Route::get('/actions', [ActionController::class, 'index']);
Route::post('/update-registry', [ActionController::class, 'updateRegistry']);
Route::delete('/delete-registry/{id}', [ActionController::class, 'deleteRegistry']);
Route::delete('/senders/{id}', [ActionController::class, 'destroy'])->name('senders.destroy');
Route::put('/senders/{id}', [ActionController::class, 'update'])->name('senders.update');
Route::get('/actions/{id}/edit', [ActionController::class, 'edit']);
Route::post('/senders/{id}', [ActionController::class, 'update']);
Route::get('/operators/search', [OperatorController::class, 'search'])->name('operators.search');
Route::get('/countries/search', [CountryController::class, 'search'])->name('countries.search');

// ***********************************************Statistics Route****************************
Route::get('/get-status-counts', [DashboardController::class, 'getStatusCounts']);
Route::get('/get-status-statistics', [DashboardController::class, 'getStatusStats']);
Route::get('/dashboard', [DashboardController::class, 'getStatusStatistics']);
Route::get('/status-chart-data', [DashboardController::class, 'getStatusChartData']);
