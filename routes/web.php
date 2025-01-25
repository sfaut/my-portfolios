<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Jobs\SendPortfolioCreatedMailJob;
// use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->get('/', function () {
    return to_route('login');
});

Route::middleware('auth')->get('/', function () {
    return to_route('portfolio.index');
});

Route::controller(PortfolioController::class)->middleware(['auth'])->group(function () {
    Route::get('/portfolios', 'index')->name('portfolio.index');
    Route::get('/portfolio/create', 'create')->name('portfolio.create');
    Route::post('/portfolio', 'store')->name('portfolio.store');
    Route::get('/portfolio/{portfolio}/show', 'show')->name('portfolio.show');
    Route::get('/portfolio/{portfolio}/edit', 'edit')->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', 'update')->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', 'destroy')->name('portfolio.destroy');

    Route::get('/portfolio/{id}', fn (int $id) => to_route('portfolio.show', ['portfolio' => $id]));
});

Route::controller(AccountController::class)->middleware(['auth'])->group(function () {
    Route::get('/portfolio/{portfolio}/account/create', 'create')->name('account.create');
    Route::post('/portfolio/{portfolio}/account', 'store')->name('account.store');

    Route::get('/account/{account}/show', 'show')->name('account.show');
    Route::get('/account/{account}/edit', 'edit')->name('account.edit');
    Route::put('/account/{account}', 'update')->name('account.update');
    Route::delete('/account/{account}', 'destroy')->name('account.destroy');
});

Route::controller(OperationController::class)->middleware(['auth'])->group(function () {
    Route::get('/account/{account}/operation/create', 'create')->name('operation.create');
    Route::post('/account/{account}/operation', 'store')->name('operation.store');
    Route::get('/operation/{operation}/edit', 'edit')->name('operation.edit');
    Route::put('/operation/{operation}', 'update')->name('operation.update');
    Route::delete('/operation/{operation}', 'destroy')->name('operation.destroy');
});

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

require __DIR__ . '/auth.php';
