<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminController;
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

Route::get('/', [AccueilController::class, "index"])->name('accueil');
Route::get('/users', [UserController::class, "index"])->name('users');
Route::get('/users/{pseudo}', [UserController::class, "show"])->name('user.show');
Route::get('/tweets/{id}', [TweetController::class, "show"])->name('tweet.show');
Route::get('/add', [TweetController::class, "create"])->name('tweets.add');
Route::post('add-tweet', [TweetController::class, "store"])->name('add');
Route::post('like', [LikeController::class, "store"])->name('like');

Route::middleware('auth')->group(function () {
    Route::post('/tweets/{tweet}/answers', [TweetController::class, 'addAnswer'])->name('answers.add');
    Route::delete('/tweets/{tweet}/answers/{answer}', [TweetController::class, 'deleteAnswer'])->name('answers.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
