<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


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

Route::post('/auth-login', [AuthController::class, 'login'])->name('auth-login');
Route::get('/login', function () {
    return view('pages.authentication.login');
})->name('login');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/get-data', [HospitalController::class, 'getData'])->name('hospital-data');
Route::get('/hospital-edit/{id}', [HospitalController::class, 'customEdit'])->name('hospital-custom-edit');
Route::resource('hospital', HospitalController::class);
Route::delete('/hospital-delete/{id}', [HospitalController::class, 'delete'])->name('hospital-delete');
