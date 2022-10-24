<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('landing');
});

Route::get('/register', [AuthController::class, 'rForm']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'lForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [PostController::class, 'swPosts']);
    Route::get('/categories/{category}', [PostController::class, 'spfCategory']);
    Route::get('/authors', [PostController::class, 'swAuthors']);
    Route::get('/authors/{id}', [PostController::class, 'apfCategory']);
    Route::get('/newpost', [PostController::class, 'nPost']);
    Route::post('/newpost', [PostController::class, 'stPost']);
});




