<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController as CommonProfileController;

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminLoanController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminSupportController;
use App\Http\Controllers\Admin\AdminAgentController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\MembershipCardController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\KycController;
use App\Http\Controllers\User\MembershipController;
use App\Http\Controllers\User\OfferController;
use App\Http\Controllers\User\LoanController;
use App\Http\Controllers\User\UserReferralController;
use App\Http\Controllers\User\SupportController;


// user routes
Route::middleware(['auth', 'user', 'renewal'])->prefix('customer')->name('user.')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [CommonProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [CommonProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/change-password', [CommonProfileController::class, 'changePassword'])->name('change-password');

    Route::get('/kyc', [KycController::class, 'index'])->name('kyc');
    Route::post('/kyc', [KycController::class, 'store'])->name('kyc.store');

    Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
    Route::get('/invoice/download', [MembershipController::class, 'downloadInvoice'])
        ->name('invoice.download');

    Route::get('/offers', [OfferController::class, 'index'])->name('offers');
    Route::get('/personal/loan', [OfferController::class, 'personalLoan'])->name('apply.personal.loan');
    Route::get('/business/loan', [OfferController::class, 'businessLoan'])->name('apply.business.loan');
    Route::post('/personal/loan', [OfferController::class, 'personalLoanStore'])->name('apply.personal.loan.store');
    Route::get('/digital-approval/{loan_id}', [OfferController::class, 'digitalApproval'])->name('digital-approval');
    Route::post('/digital-approval/{loan_id}', [OfferController::class, 'digitalApprovalStore'])->name('personal.store.approval');
    Route::get('/digital-approval-success', [OfferController::class, 'digitalApprovalSuccess'])->name('digital-approval.success');

    Route::get('/loan/history', [LoanController::class, 'history'])->name('loan.history');

    Route::get('/my-referral', [UserReferralController::class, 'index'])->name('referal');
    Route::post('/generate-referral', [UserReferralController::class, 'generate'])->name('generate.referal');

    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');
});

// admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/change-password', [AdminProfileController::class, 'changePassword'])->name('change-password');

    Route::get('/membership-card', [MembershipCardController::class, 'index'])->name('membership-card');
    Route::post('/membership-card/update', [MembershipCardController::class, 'update'])->name('membership-card.update');

    Route::get('/customers', [AdminUserController::class, 'index'])->name('users');
    Route::get('/customers/show/{id}', [AdminUserController::class, 'show'])->name('users.show');
    Route::get('/customers/documents/{id}', [AdminUserController::class, 'documents'])->name('users.documents');
    Route::get('/customers/loanHistory/{id}', [AdminUserController::class, 'loanHistory'])->name('users.loanHistory');
    Route::get('/customers/supportLog/{id}', [AdminUserController::class, 'supportLog'])->name('users.supportLog');

    Route::get('/loan-applications', [AdminLoanController::class, 'index'])->name('loan-applications');
    Route::get('/loan-applications/edit/{id}', [AdminLoanController::class, 'edit'])->name('loan-applications.edit');
    Route::post('/loan-applications/edit/{id}', [AdminLoanController::class, 'update'])->name('loan-applications.update');

    Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads');
    Route::get('/leads/show/{id}', [AdminLeadController::class, 'show'])->name('leads.show');

    Route::get('/agents', [AdminAgentController::class, 'index'])->name('agents');
    Route::get('/agent/store', [AdminAgentController::class, 'add'])->name('agent.add');
    Route::post('/agent/store', [AdminAgentController::class, 'store'])->name('agent.store');

    Route::get('/enquiries', [AdminController::class, 'showEnquiry'])->name('enquiries');

    Route::get('/ads', [AdminAdvertisementController::class, 'index'])->name('ads.show');
    Route::get('/ads/view/{id}', [AdminAdvertisementController::class, 'view'])->name('ads.view');
    Route::get('/ads/add', [AdminAdvertisementController::class, 'create'])->name('ads.add');
    Route::post('/ads/add', [AdminAdvertisementController::class, 'store'])->name('ads.store');
    Route::get('/ads/edit/{id}', [AdminAdvertisementController::class, 'edit'])->name('ads.edit');
    Route::post('/ads/edit/{id}', [AdminAdvertisementController::class, 'update'])->name('ads.update');
    Route::delete('/ads/delete/{id}', [AdminAdvertisementController::class, 'delete'])->name('ads.delete');

    Route::get('/support', [AdminSupportController::class, 'index'])->name('support');
});


// agent routes
Route::middleware(['auth', 'agent'])->prefix('agent')->name('agent.')->group(function () {


    Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
});


// auth routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [CommonProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [CommonProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [CommonProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customer/renewal', [UserController::class, 'showRenewal'])->name('customer.renewal');
});

require __DIR__ . '/auth.php';
