<?php

use App\Http\Controllers\Api\CheckRfIdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/check-rfid', [CheckRfIdController::class, 'store']);
