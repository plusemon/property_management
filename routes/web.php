<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    return redirect(route('dashboard'));
});


Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::resource('dashboard', 'DashboardController');

    //RENT
    Route::resource('property/type', 'TypeController');
    Route::resource('property', 'PropertyController');
    Route::resource('tent', 'TentController');
    Route::resource('agreement', 'AgreementController');
    Route::resource('payment', 'PaymentController');
    //

    Route::resource('borrow', 'BorrowController');
    Route::resource('expense/type', 'TypeController');
    Route::resource('expense', 'ExpenseController');
    Route::resource('loan', 'LoanController');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('setting', 'SettingController');
    Route::get('report', 'TypeController@report')->name('report.index');


});
