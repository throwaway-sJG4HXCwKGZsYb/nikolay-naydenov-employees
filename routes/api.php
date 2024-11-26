<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/employees/pairs', [EmployeesController::class, 'retrievePair']);
