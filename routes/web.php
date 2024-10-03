<?php

use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

