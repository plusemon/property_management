<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', 'admin/dashboard');


//DASHBOARD
Route::get('dashboard', 'AdminController@dashboard');

//RENT
Route::resource('property/type', 'TypeController');
Route::resource('property', 'PropertyController');

Route::resource('expence', 'ExpenceController');
Route::resource('loan', 'LoanController');
Route::resource('brow', 'BrowController');