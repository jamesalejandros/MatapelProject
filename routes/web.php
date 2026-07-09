<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoftwareMasterController;
use App\Http\Controllers\SoftwareDetailLicensingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::controller(ProfileController::class)->group(function () {

        Route::get('/profile', 'edit')
            ->name('profile.edit');

        Route::patch('/profile', 'update')
            ->name('profile.update');

        Route::delete('/profile', 'destroy')
            ->name('profile.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Software Master
    |--------------------------------------------------------------------------
    */

    Route::resource('software-master', SoftwareMasterController::class);

    Route::get(
    '/software-detail',
    [SoftwareDetailLicensingController::class, 'index']
    )->name('software-detail.index');

    /*
    |--------------------------------------------------------------------------
    | Software Detail
    |--------------------------------------------------------------------------
    | Seluruh proses Create & Store berasal dari Software Master
    |--------------------------------------------------------------------------
    */

    Route::prefix('software-master/{softwareMaster}')
        ->group(function () {

            Route::get(
                '/detail/create',
                [SoftwareDetailLicensingController::class, 'create']
            )->name('software-detail.create');

            Route::post(
                '/detail',
                [SoftwareDetailLicensingController::class, 'store']
            )->name('software-detail.store');

        });

    /*
    |--------------------------------------------------------------------------
    | Software Detail Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/software-detail',
        [SoftwareDetailLicensingController::class, 'index']
    )->name('software-detail.index');

    Route::get(
        '/software-detail/{softwareDetail}',
        [SoftwareDetailLicensingController::class, 'show']
    )->name('software-detail.show');

    Route::get(
        '/software-detail/{softwareDetail}/edit',
        [SoftwareDetailLicensingController::class, 'edit']
    )->name('software-detail.edit');

    Route::put(
        '/software-detail/{softwareDetail}',
        [SoftwareDetailLicensingController::class, 'update']
    )->name('software-detail.update');

    Route::delete(
        '/software-detail/{softwareDetail}',
        [SoftwareDetailLicensingController::class, 'destroy']
    )->name('software-detail.destroy');
});