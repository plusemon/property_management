<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'AdminController@dashboard');
Route::get('dashboard', 'AdminController@dashboard');


//DASHBOARD

//RENT
    //Property
    Route::resource('property/type', 'TypeController');
    Route::resource('property', 'PropertyController');
    // Tent
    Route::resource('tent', 'TentController');
    // Agreement
    Route::resource('agreement', 'AgreementController');
    // Payment
    Route::resource('payment', 'PaymentController');
//

Route::resource('borrow', 'BorrowController');

// Route::resource('expence', 'ExpenceController');
Route::resource('loan', 'LoanController');

Route::resource('user', 'UserController');

// ajax routes
Route::get('get-properties', 'PropertyController@properties');
Route::get('get-agreement', 'AgreementController@agreement');