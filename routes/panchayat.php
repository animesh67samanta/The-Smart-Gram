<?php

use App\Http\Controllers\panchayat\AuthPanchayatController;
use App\Http\Controllers\panchayat\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panchayat\TaxCalculationController;
use App\Http\Controllers\panchayat\CertificateController;
use App\Http\Controllers\admin\OfficerController;



Route::prefix('panchayat')->name('panchayat.')->group(function () {
    Route::get('login', [AuthPanchayatController::class, 'showLoginForm'])->name('login');
    Route::post('login-action', [AuthPanchayatController::class, 'login'])->name('login-action');
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AuthPanchayatController::class, 'dashboard'])->name('dashboard');
        Route::get('/officer-dashboard', [AuthPanchayatController::class, 'officerDashboard'])->name('officer.dashboard');
        Route::get('/profile', [AuthPanchayatController::class, 'profile'])->name('profile');
        Route::post('/password/update', [AuthPanchayatController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/profile/update', [AuthPanchayatController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/logout', [AuthPanchayatController::class, 'logout'])->name('logout');
        // Other panchayat routes...

        Route::get('/property-list', [PropertyController::class, 'index'])->name('property.list'); // List properties
        Route::get('/property-create', [PropertyController::class, 'create'])->name('property.create');

        Route::post('/property-csv-store', [PropertyController::class, 'uploadCsv'])->name('properties.upload');

        Route::post('/property-store', [PropertyController::class, 'store'])->name('property.store');
        Route::get('/property-edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');

        Route::post('/property-update/{id}', [PropertyController::class, 'update'])->name('property.update');
        Route::post('/property-delete/{id}', [PropertyController::class, 'destroy'])->name('property.delete');
        Route::get('hometaxes', [TaxCalculationController::class, 'hometaxList'])->name('hometaxes.index');
        Route::get('hometaxes/create', [TaxCalculationController::class, 'hometaxCreate'])->name('hometaxes.create');
        Route::post('hometaxes', [TaxCalculationController::class, 'hometaxStore'])->name('hometaxes.store');
        Route::get('hometaxes/details/{id}', [TaxCalculationController::class, 'homeTaxCalculationDetails'])->name('hometaxes.details');
        Route::get('hometaxes/{hometax}/edit', [TaxCalculationController::class, 'hometaxEdit'])->name('hometaxes.edit');
        Route::put('hometaxes/{hometax}', [TaxCalculationController::class, 'hometaxUpdate'])->name('hometaxes.update');
        Route::delete('hometaxes/{hometax}', [TaxCalculationController::class, 'hometaxDestroy'])->name('hometaxes.destroy');
        Route::get('hometaxes/payment-create/{id}', [TaxCalculationController::class, 'homeTaxPaymentCreate'])->name('hometaxes.payment.create');
        Route::post('hometaxes/payment-store/{id}', [TaxCalculationController::class, 'homeTaxPaymentStore'])->name('hometaxes.payment.store');
        Route::get('hometaxes/{hometax}/due-create', [TaxCalculationController::class, 'homeTaxPaymentDueCreate'])->name('hometaxes.due.create');
        Route::post('hometaxes/{hometax}', [TaxCalculationController::class, 'homeTaxPaymentDueStore'])->name('hometaxes.due.store');
        // Payment slip
        Route::get('hometaxes/payment-recipt/{id}', [TaxCalculationController::class, 'homeTaxPaymentRecipt'])->name('hometaxes.payment.recipt');
        Route::get('hometaxes/payment-chalan/{id}', [TaxCalculationController::class, 'homeTaxPaymentChalan'])->name('hometaxes.payment.chalan');


        // Demand Bill
        Route::get('hometaxes/demand-bill/{id}', [TaxCalculationController::class, 'homeTaxDemandBill'])->name('hometaxes.demand.bill');

        //health tax
        Route::get('healthtaxes', [TaxCalculationController::class, 'healthtaxList'])->name('healthtaxes.payment.index');
        Route::get('healthTaxes/payment-create', [TaxCalculationController::class, 'healthTaxPaymentCreate'])->name('healthtaxes.payment.create');
        Route::post('healthTaxes/payment-store', [TaxCalculationController::class, 'healthTaxPaymentStore'])->name('healthtaxes.payment.store');
        Route::get('healthtaxes/{healthtax}/due-create', [TaxCalculationController::class, 'healthTaxPaymentDueCreate'])->name('healthtaxes.due.create');
        Route::post('healthtaxes/{healthtax}', [TaxCalculationController::class, 'healthTaxPaymentDueStore'])->name('healthtaxes.due.store');
        //Lamp Tax
        Route::get('lamptaxes', [TaxCalculationController::class, 'lamptaxList'])->name('lamptaxes.payment.index');
        Route::get('lampTaxes/payment-create', [TaxCalculationController::class, 'lampTaxPaymentCreate'])->name('lamptaxes.payment.create');
        Route::post('lampTaxes/payment-store', [TaxCalculationController::class, 'lampTaxPaymentStore'])->name('lamptaxes.payment.store');
        Route::get('lamptaxes/{lamptax}/due-create', [TaxCalculationController::class, 'lampTaxPaymentDueCreate'])->name('lamptaxes.due.create');
        Route::post('lamptaxes/{lamptax}', [TaxCalculationController::class, 'lampTaxPaymentDueStore'])->name('lamptaxes.due.store');
        //Penalty
        Route::get('penalty/list', [TaxCalculationController::class, 'penaltyList'])->name('penalty.index');
        Route::get('penalty/payment-create', [TaxCalculationController::class, 'penaltyPaymentCreate'])->name('penalty.payment.create');
        Route::post('penalty/payment-store', [TaxCalculationController::class, 'penaltyPaymentStore'])->name('penalty.payment.store');


        //certificate route
        //Birthcertificate route

        Route::get('birthCertificate/list', [CertificateController::class, 'birthCertificateList'])->name('birthCertificate.list');
        Route::get('birthCertificate/create', [CertificateController::class, 'birthCertificateCreate'])->name('birthCertificate.create');
        Route::post('birthCertificate/store', [CertificateController::class, 'birthCertificateStore'])->name('birthCertificate.store');
        Route::post('birthCertificate/bulkUpload', [CertificateController::class, 'birthCertificateBulkUpload'])->name('birthCertificate.bulkUpload');
        Route::get('birthCertificate/details/{id}', [CertificateController::class, 'birthCertificateDetails'])->name('birthCertificate.details');
        Route::get('birthCertificate/edit/{id}', [CertificateController::class, 'birthCertificateEdit'])->name('birthCertificate.edit');
        Route::post('birthCertificate/update/{id}', [CertificateController::class, 'birthCertificateUpdate'])->name('birthCertificate.update');
        Route::get('birthCertificate/allValues/{id}', [CertificateController::class, 'birthCertificateAllValues'])->name('birthCertificate.allValues');


        //Deathcertificate route
        Route::get('deathCertificate/list', [CertificateController::class, 'deathCertificateList'])->name('deathCertificate.list');
        Route::get('deathCertificate/create', [CertificateController::class, 'deathCertificateCreate'])->name('deathCertificate.create');
        Route::post('deathCertificate/store', [CertificateController::class, 'deathCertificateStore'])->name('deathCertificate.store');
        Route::post('deathCertificate/bulkUpload', [CertificateController::class, 'deathCertificateBulkUpload'])->name('deathCertificate.bulkUpload');
        Route::get('deathCertificate/details/{id}', [CertificateController::class, 'deathCertificateDetails'])->name('deathCertificate.details');
        Route::get('deathCertificate/edit/{id}', [CertificateController::class, 'deathCertificateEdit'])->name('deathCertificate.edit');
        Route::post('deathCertificate/update/{id}', [CertificateController::class, 'deathCertificateUpdate'])->name('deathCertificate.update');
        Route::get('deathCertificate/allValues/{id}', [CertificateController::class, 'deathCertificateAllValues'])->name('deathCertificate.allValues');

        //Marriagecertificate route
        Route::get('marriageCertificate/list', [CertificateController::class, 'marriageCertificateList'])->name('marriageCertificate.list');
        Route::get('marriageCertificate/create', [CertificateController::class, 'marriageCertificateCreate'])->name('marriageCertificate.create');
        Route::post('marriageCertificate/store', [CertificateController::class, 'marriageCertificateStore'])->name('marriageCertificate.store');
        Route::get('marriageCertificate/details/{id}', [CertificateController::class, 'marriageCertificateDetails'])->name('marriageCertificate.details');
        Route::get('marriageCertificate/edit/{id}', [CertificateController::class, 'marriageCertificateEdit'])->name('marriageCertificate.edit');
        Route::post('marriageCertificate/update/{id}', [CertificateController::class, 'marriageCertificateUpdate'])->name('marriageCertificate.update');
        Route::get('marriageCertificate/allValues/{id}', [CertificateController::class, 'marriageCertificateAllValues'])->name('marriageCertificate.allValues');

        Route::get('oldCertificate/create', [CertificateController::class, 'oldCertificateCreate'])->name('oldCertificate.create');
        Route::post('oldCertificate/store', [CertificateController::class, 'oldCertificateStore'])->name('oldCertificate.store');
        Route::get('oldCertificate/list', [CertificateController::class, 'oldCertificateList'])->name('oldCertificate.list');

        Route::get('penalty/payment-create', [TaxCalculationController::class, 'penaltyPaymentCreate'])->name('penalty.payment.create');

        //Route For Namuna
        Route::get('namuna/nine/select', [TaxCalculationController::class, 'namunaNineSelect'])->name('namuna.nine.select');
        Route::post('namuna/nine/details', [TaxCalculationController::class, 'namunaNineDetails'])->name('namuna.nine.details');

        Route::get('namuna/nine/bulk', [TaxCalculationController::class, 'namunaNineBulk'])->name('namuna.nine.bulk');
        Route::post('namuna/nine/bulk-download', [TaxCalculationController::class, 'namunaNineBulkDownload'])->name('namuna.nine.bulk.download');


        Route::get('namuna/eight/select', [TaxCalculationController::class, 'namunaEightSelect'])->name('namuna.eight.select');
        Route::post('namuna/eight/details', [TaxCalculationController::class, 'namunaEightDetails'])->name('namuna.eight.details');

        Route::post('/store-previous-year-data', [TaxCalculationController::class, 'storePreviousYearData'])->name('storePreviousYearData');
        Route::get('namuna/nine/details', [TaxCalculationController::class, 'namunaNineDetails'])->name('namuna.nine.details.get');

        // Route for certificate approval
        Route::get('birth/certificate/approval/list', [OfficerController::class, 'birthCertificateApprovalList'])->name('birthCertificate.approval.list');
        Route::get('birth/certificate/approve/{id}', [OfficerController::class, 'birthCertificateApprove'])->name('birthCertificate.approve');

        Route::get('death/certificate/approval/list', [OfficerController::class, 'deathCertificateApprovalList'])->name('deathCertificate.approval.list');
        Route::get('death/certificate/approve/{id}', [OfficerController::class, 'deathCertificateApprove'])->name('deathCertificate.approve');

        Route::get('marriaage/certificate/approval/list', [OfficerController::class, 'marriageCertificateApprovalList'])->name('marriageCertificate.approval.list');
        Route::get('marriage/certificate/approve/{id}', [OfficerController::class, 'marriageCertificateApprove'])->name('marriageCertificate.approve');

        // Route for officer certificate view

        Route::get('birth/certificate/officer/view/{id}', [OfficerController::class, 'birthCertificateView'])->name('birthCertificate.officer.view');
        Route::get('death/certificate/officer/view/{id}', [OfficerController::class, 'deathCertificateView'])->name('deathCertificate.officer.view');
        Route::get('marriage/certificate/officer/view/{id}', [OfficerController::class, 'marriageCertificateView'])->name('marriageCertificate.officer.view');
    });
});
