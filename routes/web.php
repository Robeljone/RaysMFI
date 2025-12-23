<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/', fn () => redirect()->route('city.index'));

Route::controller(CityController::class)->group(function () {
    Route::get('/city', 'index')->name('city.index');
    Route::get('/city/create', 'create')->name('city.create');
    Route::post('/city', 'store')->name('city.store');
    Route::get('/city/{id}/edit', 'edit')->name('city.edit');
    Route::put('/city/{id}', 'update')->name('city.update');
    Route::delete('/city/{id}', 'destroy')->name('city.destroy');
});
