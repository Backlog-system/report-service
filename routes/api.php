<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('reports/', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::post('reports/', [ReportController::class, 'store'])->name('reports.store')->middleware('lowercase');
Route::put('reports/{id}', [ReportController::class, 'update'])->name('reports.update')->middleware('lowercase');
Route::patch('reports/{id}', [ReportController::class, 'close'])->name('reports.close');
