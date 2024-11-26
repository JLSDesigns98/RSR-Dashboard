<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/edit',[StoreController::class, 'edit'])->name('edit');

Route::post('/importSheets', [StoreController::class, 'importSheets'])->name('importSheets');
Route::post('/import', [StoreController::class, 'import'])->name('import');