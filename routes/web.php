<?php

use App\Http\Controllers\ActionController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VueController;

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

//*************************Return dashbord and form view ***************************************/
Route::get('/addsender', function () {
    return view('form');
})->name('form');
Route::post('/addsender/store',[RegisterController::class, 'store']);
Route::get('/dashboard', [RegisterController::class, 'dashboard']);
//*************************Return detail  view ***************************************/
// Route::get('/searchsender', [SearchController::class, 'search']);
// Route::get('/searchsender', [SearchController::class, 'dashboard']);
// Route::get('/searchsender/{id}', [SearchController::class, 'show']);
// Route::get('/searchsender', [SearchController::class, 'sender']);
// Route::get('/sender', [SenderController::class, 'index']);

Route::post('/search', [SearchController::class, 'searchs'])->name('search.searchs');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/{id}/details', [SearchController::class, 'show']);
Route::get('/search/{type}', [SearchController::class, 'export'])->name('search.export');




Route::get('/actions', [ActionController::class, 'dashboard']);
Route::get('/actions', [ActionController::class, 'index']);
// Route::get('/actions/search', [ActionController::class, 'search']);
Route::get('/actions/{id}', [ActionController::class, 'show']);
Route::put('/actions/{id}', [ActionController::class, 'update']);
Route::delete('/actions/{id}', [ActionController::class, 'destroy']);
Route::get('/actions/{type}/exported', [ActionController::class, 'exported'])->name('actions.exported');

