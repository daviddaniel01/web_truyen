<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLoginMiddleware;
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


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('process_login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'processRegister'])->name('process_register');


Route::group([
    'middleware' => CheckLoginMiddleware::class,
], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::resource('users', UserController::class)->except([
        'show',
    ]);
    Route::resource('stories', StoryController::class)->except([
        'show',
    ]);

    Route::resource('categories', CategoryController::class)->except([
        'show',
    ]);
    Route::resource('authors', AuthorController::class)->except([
        'show',
    ]);
    Route::resource('chapters', ChapterController::class)->except([
        'show',
    ]);
    Route::get('stories/{story}', [StoryController::class, 'showChapters'])->name('stories.showchapters');
});
