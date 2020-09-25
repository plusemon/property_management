<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();


Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/home', function () {
    return view('home');
});
