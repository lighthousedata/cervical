<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\ReferralController;

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
    return view('auth.login');
});

Route::get('/newclient', [App\Http\Controllers\ClientController::class, 'create'])->name('newclient');
Route::post('/saveclient', [App\Http\Controllers\ClientController::class, 'store'])->name('saveclient');

Route::get('/referral', [App\Http\Controllers\ReferralController::class, 'create'])->name('referral');
Route::post('/savereferral', [App\Http\Controllers\ReferralController::class, 'store'])->name('savereferral');
Route::get('/filterclient', [App\Http\Controllers\ReferralController::class, 'filterclients'])->name('filterclient');

Route::get('/referraloutcome', [App\Http\Controllers\OutcomeController::class, 'create'])->name('referraloutcome');
Route::post('/outcomes', [App\Http\Controllers\OutcomeController::class, 'store'])->name('outcomes');

Route::get('/editoutcome/{id}', [App\Http\Controllers\OutcomeController::class, 'edit'])->name('editoutcome');
Route::put('/updateoutcome/{id}', [App\Http\Controllers\OutcomeController::class, 'update'])->name('updateoutcome');
Route::get('/searchoutcome', [App\Http\Controllers\OutcomeController::class, 'search'])->name('searchoutcome');
Route::get('/searchclient', [App\Http\Controllers\OutcomeController::class, 'client'])->name('searchclient');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
