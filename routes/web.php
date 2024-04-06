<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/form-request', function () {
    return view('form-request');
})->middleware(['auth', 'verified'])->name('form-request');

Route::get('/form-request-master', function () {
    return view('form-request-master');
})->middleware(['auth', 'verified'])->name('form-request-master');

Route::post('/form-submit', [FormRequestController::class, 'create_form_request'])->name('form_submit');
Route::get('/form-request-view', [FormRequestController::class, 'form_requests_view'])->name('form-request-view');
Route::get('/form-requests/search', [FormRequestController::class, 'search'])->name('form_requests.search');
Route::get('form_requests/{id}/edit', [FormRequestController::class, 'edit'])->name('form_requests.edit');
Route::put('form_requests/{id}', [FormRequestController::class, 'update'])->name('form_requests.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
