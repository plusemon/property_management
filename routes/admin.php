<?php

use Illuminate\Support\Facades\Route;
Route::redirect('/', 'admin/dashboard');



Route::get('dashboard', 'AdminController@dashboard');

Route::resource('expence', 'ExpenceController');
Route::resource('loan', 'LoanController');
Route::resource('brow', 'BrowController');