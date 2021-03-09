<?php

use App\Http\Controllers\ImportController;
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
    return view('welcome');
});

Route::get('/import', function () {
    return view('import');
});



//Auth::routes();

Route::get('export', [App\Http\Controllers\ExportController::class, 'index'])->name('export');
Route::get('export/download', [App\Http\Controllers\ExportController::class, 'download']);
Route::get('reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports');
Route::get('dashboard', [App\Http\Controllers\DashboardContoller::class, 'index'])->name('dashboard');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/upload', [App\Http\Controllers\ImportController::class, 'upload'])->name('upload');
Route::post('upload', [ImportController::class, 'upload']);
