<?php

use Illuminate\Support\Facades\Route;



//DASHBOARD
Route::get('dashboard', 'AdminController@dashboard');

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

// Route::resource('borrow', 'BorrowController');

// Route::resource('expence', 'ExpenceController');
// Route::resource('loan', 'LoanController');


// ajax routes
Route::get('get-properties', 'PropertyController@properties');