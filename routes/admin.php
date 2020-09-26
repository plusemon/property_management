<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', 'admin/dashboard');


//DASHBOARD
Route::get('dashboard', 'AdminController@dashboard');

//RENT
//Property
Route::resource('property/type', 'TypeController');
Route::resource('property', 'PropertyController');
// Tent
Route::resource('tent', 'TentController');

Route::resource('borrow', 'BorrowController');

Route::resource('expence', 'ExpenceController');
Route::resource('loan', 'LoanController');