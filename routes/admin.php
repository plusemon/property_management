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

Route::resource('role', 'RoleController');
Route::resource('permission', 'PermissionController');

Route::get('settings', 'AdminController@setting');
Route::post('settings', 'AdminController@settingUpdate');

// ajax routes
Route::get('ajax/properties', 'AjaxController@properties');
Route::get('ajax/agreement-info', 'AjaxController@agreementInfo');
Route::get('ajax/payment-status', 'AjaxController@paymentMonthStatus');
Route::get('ajax/wallet-balance', 'AjaxController@walletBalance');
