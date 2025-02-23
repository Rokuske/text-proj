<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TextController;

Route::controller(TextController::class)->group(function () {
    Route::get('/', 'index')->name('texts.index');
    Route::post('/texts', 'store')->name('texts.store');
    Route::get('/texts/{id}/pdf', 'exportPdf')->name('texts.pdf');
});