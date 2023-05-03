<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/graph-data-show', [App\Http\Controllers\Auth\ProfileController::class, 'getGraphData'])->name('graph-data-show');
Route::get('/all-users', [App\Http\Controllers\Auth\ProfileController::class, 'showAllUsers'])->name('all-users');
Route::get('/active-user/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'userActivate'])->name('active-user');
Route::get('/deactive-user/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'userDeActivate'])->name('deactive-user');
Route::get('/delete-user/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'userDelete'])->name('delete-user');
//company operations
Route::get('/all-company', [App\Http\Controllers\Auth\ProfileController::class, 'showAllCompanies'])->name('all-company');
Route::get('/create-company', [App\Http\Controllers\Auth\ProfileController::class, 'createCompany'])->name('create-company');
Route::get('/edit-company/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'editCompany'])->name('edit-company');
Route::get('/upload-company-details/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'uploadCompanyDetails'])->name('upload-company-details');
Route::get('/map-company/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'mapCompanies'])->name('map-company');
Route::post('/map-company-details', [App\Http\Controllers\Auth\ProfileController::class, 'mapCompanyDetails'])->name('map-company-details');
Route::post('/update-company', [App\Http\Controllers\Auth\ProfileController::class, 'updateCompany'])->name('update-company');
Route::post('/save-company', [App\Http\Controllers\Auth\ProfileController::class, 'saveCompany'])->name('save-company');
Route::get('/export-company-data/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'exportCompanyData']);
Route::post('/import-company-data', [App\Http\Controllers\Auth\ProfileController::class, 'importCompanyData'])->name('import-company-data');
Route::get('/export-company-mapping', [App\Http\Controllers\Auth\ProfileController::class, 'exportCompanyMapping'])->name('export-company-mapping');
