<?php

use App\Http\Controllers\Hospital\AdminController;
use App\Http\Controllers\Hospital\UserController;
use App\Http\Controllers\Hospital\AssociatePartnerController;
use App\Http\Controllers\Hospital\Auth\ChangePasswordController;
use App\Http\Controllers\Hospital\Auth\ForgotPasswordController;
use App\Http\Controllers\Hospital\Auth\LoginController;
use App\Http\Controllers\Hospital\Auth\MyAccountController;
use App\Http\Controllers\Hospital\Auth\ResetPasswordController;
use App\Http\Controllers\Hospital\DashboardController;
use App\Http\Controllers\Hospital\HospitalController;
use App\Http\Controllers\Hospital\PatientController;
use App\Http\Controllers\Hospital\ClaimController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Hospital Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'hospital', 'as' => 'hospital.'], function () {

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
    Route::get('admins/import-export',[AdminController::class,'importExport'])->name('admins.import-export');
    Route::post('admins/import',[AdminController::class,'import'])->name('admins.import');
    Route::get('admins/export',[AdminController::class,'export'])->name('admins.export');
    Route::post('admin/change-pasword', [AdminController::class, 'changePassword'])->name('admins.change-password');

    /*
    |--------------------------------------------------------------------------
    | Users Route
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);
    Route::get('users/import-export',[UserController::class,'importExport'])->name('users.import-export');
    Route::post('users/import',[UserController::class,'import'])->name('users.import');
    Route::get('users/export',[UserController::class,'export'])->name('users.export');
    Route::post('user/change-pasword', [UserController::class, 'changePassword'])->name('users.change-password');

    /*
    |--------------------------------------------------------------------------
    | Hospitals Route
    |--------------------------------------------------------------------------
    */

    Route::resource('hospitals', HospitalController::class); 
    Route::post('hospital/change-pasword', [HospitalController::class, 'changePassword'])->name('hospitals.change-password');

    /*
    |--------------------------------------------------------------------------
    | Claims Route
    |--------------------------------------------------------------------------
    */

    Route::resource('claims', ClaimController::class);

    /*
    |--------------------------------------------------------------------------
    | Patients Route
    |--------------------------------------------------------------------------
    */
    Route::resource('patients', PatientController::class);

    /*
    |--------------------------------------------------------------------------
    | Associate partners Route
    |--------------------------------------------------------------------------
    */

    Route::resource('associate-partners', AssociatePartnerController::class);
    Route::get('associate-partners/import-export',[AssociatePartnerController::class,'importExport'])->name('associate-partners.import-export');
    Route::post('associate-partners/import',[AssociatePartnerController::class,'import'])->name('associate-partners.import');
    Route::get('associate-partners/export',[AssociatePartnerController::class,'export'])->name('associate-partners.export');
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
