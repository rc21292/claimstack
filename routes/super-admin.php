<?php

use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\AssociatePartnerController;
use App\Http\Controllers\SuperAdmin\Auth\ChangePasswordController;
use App\Http\Controllers\SuperAdmin\Auth\ForgotPasswordController;
use App\Http\Controllers\SuperAdmin\Auth\LoginController;
use App\Http\Controllers\SuperAdmin\Auth\MyAccountController;
use App\Http\Controllers\SuperAdmin\Auth\ResetPasswordController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\HospitalController;
use App\Http\Controllers\SuperAdmin\Claims\ClaimController;
use App\Http\Controllers\SuperAdmin\Claims\ClaimantController;
use App\Http\Controllers\SuperAdmin\Claims\PatientController;
use App\Http\Controllers\SuperAdmin\UtilityController;
use App\Http\Controllers\SuperAdmin\BillEntryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'super-admin', 'as' => 'super-admin.'], function () {

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
    | Admin Import Export Route
    |--------------------------------------------------------------------------
    */

    Route::get('admins/import-export',[AdminController::class,'importExport'])->name('admins.import-export');
    Route::post('admins/import',[AdminController::class,'import'])->name('admins.import');
    Route::get('admins/export',[AdminController::class,'export'])->name('admins.export');

     /*
    |--------------------------------------------------------------------------
    | Admins Route
    |--------------------------------------------------------------------------
    */

    Route::resource('admins', AdminController::class);
    Route::post('admin/change-pasword', [AdminController::class, 'changePassword'])->name('admins.change-password');

    /*
    |--------------------------------------------------------------------------
    | Users Import Export Route
    |--------------------------------------------------------------------------
    */

    Route::get('users/import-export',[UserController::class,'importExport'])->name('users.import-export');
    Route::post('users/import',[UserController::class,'import'])->name('users.import');
    Route::get('users/export',[UserController::class,'export'])->name('users.export');

    /*
    |--------------------------------------------------------------------------
    | Users Route
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);
    Route::post('user/change-pasword', [UserController::class, 'changePassword'])->name('users.change-password');

    /*
    |--------------------------------------------------------------------------
    | Admin Import Export Route
    |--------------------------------------------------------------------------
    */

    Route::get('associate-partners/import-export',[AssociatePartnerController::class,'importExport'])->name('associate-partners.import-export');
    Route::post('associate-partners/import',[AssociatePartnerController::class,'import'])->name('associate-partners.import');
    Route::get('associate-partners/export',[AssociatePartnerController::class,'export'])->name('associate-partners.export');


    /*
    |--------------------------------------------------------------------------
    | Hospitals Route
    |--------------------------------------------------------------------------
    */

    Route::get('hospitals/import-export',[HospitalController::class,'importExport'])->name('hospitals.import-export');
    Route::post('hospitals/import',[HospitalController::class,'import'])->name('hospitals.import');
    Route::get('hospitals/export',[HospitalController::class,'export'])->name('hospitals.export');

    Route::resource('hospitals', HospitalController::class);

    Route::put('hospitals/tie-ups/{id}', [HospitalController::class, 'updateHospitalTieUps'])->name('hospitals.tie-ups');

    Route::put('hospitals/infrastructures/{id}', [HospitalController::class, 'updateHospitalInfrastructure'])->name('hospitals.infrastructures');

    Route::put('hospitals/facility/{id}', [HospitalController::class, 'updateHospitalFacility'])->name('hospitals.facility');

    Route::put('hospitals/department/{id}', [HospitalController::class, 'updateHospitalDepartment'])->name('hospitals.department');

    Route::put('hospitals/empanelment-status/{id}', [HospitalController::class, 'updateHospitalEmpanelmentStatus'])->name('hospitals.empanelment-status');

    Route::post('hospital/change-pasword', [HospitalController::class, 'changePassword'])->name('hospitals.change-password');


    /*
    |--------------------------------------------------------------------------
    | Claims Route
    |--------------------------------------------------------------------------
    */

    Route::get('claims/bill-entry', [ClaimController::class, 'billEntry'])->name('bill-entry');

    Route::resource('bill-entries', BillEntryController::class);


    /*
    |--------------------------------------------------------------------------
    | Claims Route
    |--------------------------------------------------------------------------
    */


    Route::get('claims/processing', [ClaimController::class, 'processing'])->name('claims.processing');
    Route::get('claims/assessment-status', [ClaimController::class, 'assessmentStatus'])->name('claims.assessment-status');
    Route::resource('claims', ClaimController::class);

    
    Route::put('claims/update-insurance-policy/{id}', [ClaimController::class, 'updateInsurancePolicy'])->name('claims.update-insurance-policy');

    /*
    |--------------------------------------------------------------------------
    | Claimant Route
    |--------------------------------------------------------------------------
    */

    Route::get('claimants/lending-status/{id}', [ClaimantController::class, 'lendingStatus']);
    Route::get('claimants/discharge-status/{id}', [ClaimantController::class, 'dischargeStatus']);
    Route::post('claimants/lending-status/{id}', [ClaimantController::class, 'saveLendingStatus'])->name('claimants.save-lending-tatus');

    Route::resource('claimants', ClaimantController::class);

    Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);

    Route::get('claimants/patient/{id}', [ClaimantController::class, 'fetchPaitientData'])->name('claimants.fetch-patient');
    
    Route::get('claimants/claimant/{id}', [ClaimantController::class, 'fetchClaimentData'])->name('claimants.fetch-claimant');

    Route::post('claimants/update-borrower-details/{id}', [ClaimantController::class, 'borrowerDetails'])->name('claimants.update-borrower-details');

    Route::post('claims/save_assesment_status',[ClaimController::class,'saveAssesmentStatus'])->name('claims.save_assesment_status');

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

    /*
    |--------------------------------------------------------------------------
    | Utility Route
    |--------------------------------------------------------------------------
    */
    Route::get('get-employees-by-department/{department}', [UtilityController::class,'getEmployeesByDepartment'])->name('get.employees');

});
