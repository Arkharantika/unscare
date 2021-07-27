<?php

// namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleAdminController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DataCovidController;
use App\Http\Controllers\IsolasiController;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [RoleAdminController::class, 'index']);
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('user', [RoleUserController::class, 'index']);
        Route::get('/user/claimpositif', [ClaimController::class, 'index']);
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    });
 
});

/// [] =================================== [] 
/// [] <- List non-middleware Routes -> == [] 
/// [] =================================== [] 


// +---------------------------------------------------------------------------------------+ //
//                                   <<< User Role >>>
// +---------------------------------------------------------------------------------------+ //

// -> Untuk Update Data User
Route::patch('/userdata/{id}', [UserDataController::class, 'update'])->name('update');

// -> Untuk CLaim Positif Covid 19
Route::get('/user/claimcovidvaksin', [ClaimController::class, 'index']);
Route::post('/user/claimcovid', [ClaimController::class, 'store'])->name('store');
Route::patch('/user/claimcovid/{id}', [ClaimController::class, 'update'])->name('update');

// -> Untuk Isolasi Mandiri
Route::get('/user/isolasimandiri', [IsolasiController::class, 'index']);



// +---------------------------------------------------------------------------------------+ //
//                                   <<< Admin Role >>>
// +---------------------------------------------------------------------------------------+ //

// -> Untuk Data Covid
Route::get('/admin/datapositifcovid', [DataCovidController::class, 'index']);
Route::get('/admin/downloadcovid/{id}', [DataCovidController::class, 'downloadcovid'])->name('downloadcovid');

