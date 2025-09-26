<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dashboard\Logistics;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('dashboard', Dashboard\DashboardController::class)->name('dashboard');
            Route::controller(Dashboard\MainSettingsController::class)->prefix('mainSettings')->as('mainSettings.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('store', 'store')->name('store');
            });
            Route::group(['prefix' => 'logistic', 'as' => 'logistic.'], function () {
                Route::resource('drivers', Logistics\DriverController::class);
                Route::resource('vehicles', Logistics\VehicleController::class);
                Route::resource('clients', Logistics\ClientController::class);
                Route::resource('suppliers', Logistics\SupplierController::class);
            });
        });

        require __DIR__ . '../../auth.php';
    }
);
