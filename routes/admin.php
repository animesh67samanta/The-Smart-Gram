<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OfficerController;
use App\Http\Controllers\admin\PropertyTaxController;
use App\Http\Controllers\panchayat\PanchayatController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::post('/password/update', [AuthController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/profile/update', [AuthController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        // Other admin routes...
        Route::get('/panchayat-create', [PanchayatController::class, 'create'])->name('panchayat.create');
        Route::post('/panchayat-store', [PanchayatController::class, 'register'])->name('panchayat.store');
        Route::get('/panchayat-list', [PanchayatController::class, 'list'])->name('panchayat.list');
        Route::get('/panchayat-edit/{id}', [PanchayatController::class, 'edit'])->name('panchayat.edit');
        Route::post('/panchayat-update/{id}', [PanchayatController::class, 'update'])->name('panchayat.update');

        Route::get('/panchayat-tax-create', [PanchayatController::class, 'createTax'])->name('panchayat.tax.create');
        Route::post('/panchayat-tax-store', [PanchayatController::class, 'registerTax'])->name('panchayat.tax.store');
        Route::get('/panchayat-tax-list', [PanchayatController::class, 'listTax'])->name('panchayat.tax.list');
        Route::get('/panchayat-tax-edit/{id}', [PanchayatController::class, 'editTax'])->name('panchayat.tax.edit');
        Route::post('/panchayat-tax-update/{id}', [PanchayatController::class, 'updateTax'])->name('panchayat.tax.update');

        //Route For Officers
        Route::get('officers/list', [OfficerController::class, 'officerList'])->name('officer.list');
        Route::get('officers/create', [OfficerController::class, 'officerCreate'])->name('officer.create');
        Route::post('officers/store', [OfficerController::class, 'officerStore'])->name('officer.store');
        Route::get('officers/edit/{id}', [OfficerController::class, 'officerEdit'])->name('officer.edit');
        Route::put('officers/update/{id}', [OfficerController::class, 'officerUpdate'])->name('officer.update');

        // Route::get('/property-list', [PropertyController::class, 'index'])->name('property.list'); // List properties
        // Route::get('/property-create', [PropertyController::class, 'create'])->name('property.create');
        // Route::post('/property-store', [PropertyController::class, 'store'])->name('property.store');
        // Route::get('/property-edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');

        // Route::post('/property-update/{id}', [PropertyController::class, 'update'])->name('property.update');
        // Route::post('/property-delete/{id}', [PropertyController::class, 'destroy'])->name('property.delete');
        // Route::delete('destroy/{id}', [BannerController::class, 'bannerDestroy'])->name('destroy');
        // Property Taxes Routes
        Route::get('/property-taxes-list', [PropertyTaxController::class, 'index'])->name('propertyTax.list');
        Route::get('/property-taxes-create', [PropertyTaxController::class, 'create'])->name('propertyTax.create');
        Route::post('/property-taxes-store', [PropertyTaxController::class, 'store'])->name('propertyTax.store');
        Route::get('/property-taxes-edit/{id}', [PropertyTaxController::class, 'edit'])->name('propertyTax.edit');
        Route::post('/property-taxes-update/{id}', [PropertyTaxController::class, 'update'])->name('propertyTax.update');
        Route::post('/property-taxes-delete/{id}', [PropertyTaxController::class, 'destroy'])->name('propertyTax.delete');
        Route::get('/property-taxes-details/{id}', [PropertyTaxController::class, 'details'])->name('propertyTax.details');

        Route::get('/namuna-form-get', [PropertyTaxController::class, 'namunaFormGet'])->name('namuna.form.list');
        Route::post('/namuna-form-save', [PropertyTaxController::class, 'saveNamuna'])->name('namuna.form.save');
    });
});
