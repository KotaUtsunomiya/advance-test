<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect()->route('contact.index');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');
Route::get('/management', [ContactController::class, 'management'])->name('management');
Route::post('/management/{contact}', [ContactController::class, 'delete'])->name('delete');