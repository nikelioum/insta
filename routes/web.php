<?php

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

//Index page
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Admin Home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Admin Companies page
Route::get('/companies', [App\Http\Controllers\HomeController::class, 'companies']);

//Admin Add New Company
Route::post('/add-company', [App\Http\Controllers\HomeController::class, 'add_company']);

//Admin Delete Company
Route::get('/delete-company/{id}', [App\Http\Controllers\HomeController::class, 'delete_company']);

//Admin Company page
Route::get('/company/{id}', [App\Http\Controllers\HomeController::class, 'company_page']);


//Admin Add New Competitor
Route::post('/add-competitor', [App\Http\Controllers\HomeController::class, 'add_competitor']);

//Admin Delete Competitor
Route::get('/delete-competitor/{id}', [App\Http\Controllers\HomeController::class, 'delete_competitor']);

//Admin Start Followers
Route::get('/start-followers/{id}', [App\Http\Controllers\HomeController::class, 'start_followers']);

//Admin Start UnFollowers
Route::get('/start-unfollowers/{id}', [App\Http\Controllers\HomeController::class, 'start_unfollowers']);

//Admin Run Followers
Route::get('/run-followers/{id}', [App\Http\Controllers\HomeController::class, 'run_followers']);

//Admin Run UnFollowers
Route::get('/run-unfollowers/{id}', [App\Http\Controllers\HomeController::class, 'run_unfollowers']);


//Admin Snapshot
Route::get('/snapshot/{id}', [App\Http\Controllers\HomeController::class, 'snapshot']);
