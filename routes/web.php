<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'app')->name('home');

Route::get('/api/portfolio', [PortfolioController::class, 'show'])->name('portfolio.data');
