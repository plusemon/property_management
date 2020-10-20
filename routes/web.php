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
    Route::resource('dashboard', 'DashboardController')->middleware('permission:manage dashboard');

    //RENT
    Route::resource('property/type', 'TypeController')->middleware('permission:manage type');
    Route::resource('property', 'PropertyController')->middleware('permission:manage property');
    Route::resource('tent', 'TentController')->middleware('permission:manage tent');
    Route::resource('agreement', 'AgreementController')->middleware('permission:manage agreement');
    Route::resource('payment', 'PaymentController')->middleware('permission:manage payment');
    //

    Route::resource('borrow', 'BorrowController')->middleware('permission:manage borrow');
    Route::resource('wellpart', 'WellpartController')->middleware('permission:manage wellpart');
    Route::resource('expense/type', 'TypeController')->middleware('permission:manage type');
    Route::resource('expense', 'ExpenseController')->middleware('permission:manage expense');
    Route::resource('loan', 'LoanController')->middleware('permission:manage loan');
    Route::resource('user', 'UserController')->middleware('permission:manage user');
    Route::resource('role', 'RoleController')->middleware('permission:manage permission');
    Route::get('report', 'TypeController@report')->name('report.index')->middleware('permission:manage report');
    Route::resource('setting', 'SettingController')->middleware('permission:manage setting');


});
