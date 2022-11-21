<?php

use App\Http\Controllers\SpendingController;
use App\Models\Spending;
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
Route::prefix('spending')->group(function () {

Route::get('/', [SpendingController::class, 'index'])->name('spending.index');
Route::get('/add', [SpendingController::class, 'create'])->name('spending.add');
Route::post('/store', [SpendingController::class, 'store'])->name('spending.store');
Route::get('/edit/{id}', [SpendingController::class, 'edit'])->name('spending.edit');
Route::put('/update/{id}', [SpendingController::class, 'update'])->name('spending.update');
Route::delete('/delete/{id}', [SpendingController::class, 'destroy'])->name('spending.delete');
});
