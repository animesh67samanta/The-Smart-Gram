<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panchayat\CertificateController;
use App\Http\Controllers\web\CertificateScanController;
use App\Http\Controllers\web\WebviewController;

Route::get('birthCertificate/{id}', [CertificateScanController::class, 'birthCertificateScan'])->name('birthCertificate');
Route::get('deathCertificate/{id}', [CertificateScanController::class, 'deathCertificateScan'])->name('deathCertificate');
Route::get('marriageCertificate/{id}', [CertificateScanController::class, 'marriageCertificateScan'])->name('marriageCertificate');

//Route for webview
Route::get('/', [WebviewController::class, 'index'])->name('webview.index');
Route::get('/about-us', [WebviewController::class, 'aboutUs'])->name('webview.aboutus');
Route::get('/contact-us', [WebviewController::class, 'contactUs'])->name('webview.contactus');
Route::post('/contact-us-submit', [WebviewController::class, 'contactUsSubmit'])->name('contactUs.submit');
