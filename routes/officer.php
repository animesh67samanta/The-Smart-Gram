<?php

use App\Http\Controllers\panchayat\OfficerController;
use App\Http\Controllers\panchayat\AuthOfficerController;
use Illuminate\Support\Facades\Route;

Route::prefix('officer')->name('officer.')->group(function () {
    // Officer Authentication Routes
    Route::get('login', [AuthOfficerController::class, 'showLoginForm'])->name('login');
    Route::post('login-action', [AuthOfficerController::class, 'login'])->name('login-action');
    
    Route::middleware('officer')->group(function () {
        // Officer Dashboard
        Route::get('/dashboard', [OfficerController::class, 'dashboard'])->name('officer.dashboard');
        
        // Officer Profile Management
        Route::get('/profile', [OfficerController::class, 'profile'])->name('profile');
        Route::post('/password/update', [OfficerController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/profile/update', [OfficerController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/logout', [OfficerController::class, 'logout'])->name('logout');
        
        // Certificate Approval Routes
        Route::get('birth/certificate/approval/list', [OfficerController::class, 'birthCertificateApprovalList'])->name('birthCertificate.approval.list');
        Route::get('birth/certificate/approve/{id}', [OfficerController::class, 'birthCertificateApprove'])->name('birthCertificate.approve');
        
        Route::get('death/certificate/approval/list', [OfficerController::class, 'deathCertificateApprovalList'])->name('deathCertificate.approval.list');
        Route::get('death/certificate/approve/{id}', [OfficerController::class, 'deathCertificateApprove'])->name('deathCertificate.approve');
        
        Route::get('marriage/certificate/approval/list', [OfficerController::class, 'marriageCertificateApprovalList'])->name('marriageCertificate.approval.list');
        Route::get('marriage/certificate/approve/{id}', [OfficerController::class, 'marriageCertificateApprove'])->name('marriageCertificate.approve');
        
        // Certificate View Routes
        Route::get('birth/certificate/view/{id}', [OfficerController::class, 'birthCertificateView'])->name('birthCertificate.view');
        Route::get('death/certificate/view/{id}', [OfficerController::class, 'deathCertificateView'])->name('deathCertificate.view');
        Route::get('marriage/certificate/view/{id}', [OfficerController::class, 'marriageCertificateView'])->name('marriageCertificate.view');
    });
}); 