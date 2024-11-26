<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeesController::class, 'showForm'])->name('form');

Route::post('/employees/pairs', [
    EmployeesController::class,
    'showPairs',
])->name('pairs');

Route::post('/employees/max-overlap-pair', [
    EmployeesController::class,
    'showMaxOverlapPair',
])->name('max-overlap-pair');
