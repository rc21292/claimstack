<?php

use App\Http\Controllers\Employee\AdminController;
use App\Http\Controllers\Employee\UserController;
use App\Http\Controllers\Employee\AssociatePartnerController;
use App\Http\Controllers\Employee\Auth\ChangePasswordController;
use App\Http\Controllers\Employee\Auth\ForgotPasswordController;
use App\Http\Controllers\Employee\Auth\LoginController;
use App\Http\Controllers\Employee\Auth\MyAccountController;
use App\Http\Controllers\Employee\Auth\ResetPasswordController;
use App\Http\Controllers\Employee\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');


    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Admins Route
    |--------------------------------------------------------------------------
    */

    Route::resource('admins', AdminController::class);

    /*
    |--------------------------------------------------------------------------
    | Users Route
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);

    /*
    |--------------------------------------------------------------------------
    | Associate partners Route
    |--------------------------------------------------------------------------
    */

    Route::resource('associate-partners', AssociatePartnerController::class);

    Route::put('associate-partners/vendor-services/{id}', [AssociatePartnerController::class, 'updateVendorServices'])->name('associate-partners.vendor-services');
    Route::put('associate-partners/sales-services/{id}', [AssociatePartnerController::class, 'updateSalesServices'])->name('associate-partners.sales-services');

     /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class,'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class,'changePassword'])->name('change-password');

});