<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PlansController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/plans/personal', [PlansController::class, 'fetchPersonalPlan'])->name('fetch.plan');
Route::get('/plans/business', [PlansController::class, 'fetchBusinessPlan'])->name('fetch.plan');

// Personal Loan Application Flow

Route::post('/personal-loan', [CustomerController::class, 'register'])->name('personal.loan.store');
Route::post('/personal-loan/verify/{no}', [CustomerController::class, 'otpVerify'])->name('personal.otpVerify');
Route::post('/personal-loan/s3/{id}', [CustomerController::class, 'storeCustomerMail'])->name('personal.storeCustomerMail');
Route::get('/get-states', [CustomerController::class, 'getStates'])->name('get.states');
Route::get('/get-cities/{state_id}', [CustomerController::class, 'getCities'])->name('get.cities');
Route::post('/personal-loan/checkeligibility/{id}', [CustomerController::class, 'storeEligibility'])->name('personal.check.eligibility');
Route::post('/personal-loan/approval/{id}', [CustomerController::class, 'storeApproval'])->name('personal.store.approval');


// Cashfree apis

Route::post('/create-order', [PaymentController::class, 'createOrder']);
Route::post('/verify-payment', [PaymentController::class, 'verifyPayment']);

// contact us

Route::post('/contact/form/submit', [CustomerController::class, 'contactSubmit'])
    ->middleware('throttle:5,1')
    ->name('contact.form.submit');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['message' => 'API working!']);
});
