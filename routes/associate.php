<?php

use App\Http\Controllers\Associate\Auth\ChangePasswordController;
use App\Http\Controllers\Associate\Auth\ForgotPasswordController;
use App\Http\Controllers\Associate\Auth\LoginController;
use App\Http\Controllers\Associate\Auth\MyAccountController;
use App\Http\Controllers\Associate\Auth\ResetPasswordController;
use App\Http\Controllers\Associate\DashboardController;
use App\Http\Controllers\Associate\AdminController;
use App\Http\Controllers\Associate\UserController;
use App\Http\Controllers\Associate\HospitalController;
use App\Http\Controllers\Associate\Claims\ClaimController;
use App\Http\Controllers\Associate\Claims\AssessmentController;
use App\Http\Controllers\Associate\Claims\DischargeStatusController;
use App\Http\Controllers\Associate\Claims\ICClaimStatusController;
use App\Http\Controllers\Associate\Claims\ClaimProcessingController;
use App\Http\Controllers\Associate\Claims\LendingStatusController;
use App\Http\Controllers\Associate\Claims\ClaimantController;
use App\Http\Controllers\Associate\Claims\BorrowerController;
use App\Http\Controllers\Associate\Claims\PatientController;
use App\Http\Controllers\Associate\AssociatePartnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Associate Partner Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'associate-partner', 'as' => 'associate-partner.'], function () {

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

    Route::resource('claims', ClaimController::class);

    Route::resource('claimants', ClaimantController::class);

    Route::resource('borrowers', BorrowerController::class);


   
    

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

    Route::resource('document-reimbursement', DocumentReimbursementController::class);
    Route::get('documents/view/{id}', [DocumentReimbursementController::class, 'showDocument'])->name('view-claim-documents');
    Route::post('document-reimbursement/update-document/{id}',[DocumentReimbursementController::class, 'updateDocument'])->name('document-reimbursement.update-document');


    Route::put('update-assessment-status/{id}', [AssessmentController::class, 'updateAssessmentStatus'])->name('assessment-status.update-assessment-status');

    Route::resource('assessment-status', AssessmentController::class);

    Route::put('claims/update-insurance-policy/{id}', [ClaimController::class, 'updateInsurancePolicy'])->name('claims.update-insurance-policy');


    Route::put('borrowers-update/{id}', [BorrowerController::class, 'updateBorrower'])->name('borrowers.borrowers-update');


    Route::resource('lending-status', LendingStatusController::class);
    

    Route::put('lending-status-update/{id}', [LendingStatusController::class, 'updateLendingStatus'])->name('lending-status.lending-status-update');
    
    /*
    |--------------------------------------------------------------------------
    | Discharge Status Controller Route
    |--------------------------------------------------------------------------
    */

    Route::resource('discharge-status', DischargeStatusController::class);
    Route::put('update-discharge-status/{id}', [DischargeStatusController::class, 'updateDischargeStatus'])->name('discharge-status.update-discharge-status');

    /*
    |--------------------------------------------------------------------------
    | Claim Processing Controller Route
    |--------------------------------------------------------------------------
    */

    Route::resource('claim-processing', ClaimProcessingController::class);
    Route::put('claim-processing-update/{id}', [ClaimProcessingController::class, 'updateClaimProcessing'])->name('claim-processing.claim-processing-update');


     /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);


    /*
    |--------------------------------------------------------------------------
    | Insurance Company Claim Status Controller Route
    |--------------------------------------------------------------------------
    */

    Route::resource('icclaim-status', ICClaimStatusController::class);

    /*

    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class,'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class,'changePassword'])->name('change-password');

    Route::get('get-employees-by-department/{department}', [UtilityController::class,'getEmployeesByDepartment'])->name('get.employees');
});
