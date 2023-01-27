<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'index'])->name('/');
Route::get('/user/register', [PageController::class, 'userRegisterIndex'])->name('user-register-index');
Route::get('/user/login', [PageController::class, 'userLoginIndex'])->name('user-login-index');
Route::post('/user/register', [RegisteredUserController::class, 'store'])->name('user-register');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('/home', [UserController::class, 'viewHome'])->name('home');
    // Contract
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'viewDashboard'])->name('dashboard');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [AdminController::class, 'viewHome'])->name('dashboard');
    Route::get('/', [AdminController::class, 'viewMain'])->name('view-home');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';