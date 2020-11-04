<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    return redirect(route('dashboard'));
});


Route::group(['middleware' => ['auth','verified']], function () {

    //DASHBOARD
    Route::resource('dashboard', 'DashboardController');

    //RENT
    Route::resource('property/type', 'TypeController');
    Route::resource('property', 'PropertyController');
    Route::resource('tent', 'TentController');
    Route::resource('agreement', 'AgreementController');
    Route::resource('payment/refund', 'PaymentReturnController');
    Route::resource('payment', 'PaymentController');
    //
    Route::resource('borrow', 'BorrowController');
    Route::resource('wellpart', 'WellpartController');
    Route::resource('expense/type', 'TypeController');
    Route::resource('expense', 'ExpenseController');

    Route::resource('loan/return', 'LoanReturnController');
    Route::resource('loan', 'LoanController');

    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::get('report', 'UserController@report')->name('report.index');
    Route::resource('setting', 'SettingController');
    Route::resource('accountant', 'AccountantController');
    Route::get('activity', 'ActivityController@index')->name('activity');
    Route::get('activity/{activity}', 'ActivityController@show')->name('activity.show');


});
