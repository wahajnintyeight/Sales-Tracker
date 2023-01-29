<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
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
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/teams', [UserController::class, 'viewTeam'])->name('team');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [AdminController::class, 'viewHome'])->name('dashboard');
    Route::get('/', [AdminController::class, 'viewMain'])->name('view-home');
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('users');
    // Teams
    Route::get('/teams', [AdminController::class, 'viewTeams'])->name('teams');
    Route::post('/teams/add', [TeamController::class, 'store'])->name('teams.add');
    Route::post('/team/assign', [AdminController::class, 'addUserToTeam'])->name('teams.assign.user');
    Route::get('/goals', [AdminController::class, 'viewGoals'])->name('goals');
    Route::post('/goals/add', [AdminController::class, 'addGoals'])->name('goals.add');

});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';