<?php

Route::group(['prefix' => 'providers'], function () {
    Route::group(['prefix' => 'rajaongkir'], function () {
        Route::get('province', [\App\Http\Controllers\Providers\RajaongkirController::class, 'province']);
        Route::get('city', [\App\Http\Controllers\Providers\RajaongkirController::class, 'city']);
        Route::get('subdistrict', [\App\Http\Controllers\Providers\RajaongkirController::class, 'subdistrict']);
        Route::post('cost', [\App\Http\Controllers\Providers\RajaongkirController::class, 'cost']);
    });

    Route::group(['prefix' => 'sicepat'], function () {
        Route::get('origin', [\App\Http\Controllers\Providers\SicepatController::class, 'origin']);
        Route::get('destination', [\App\Http\Controllers\Providers\SicepatController::class, 'destination']);
        Route::post('tariff', [\App\Http\Controllers\Providers\SicepatController::class, 'tariff']);
        Route::post('waybill', [\App\Http\Controllers\Providers\SicepatController::class, 'waybill']);
    });

    Route::resource('tiki', \App\Http\Controllers\Providers\TikiController::class);

    Route::resource('duha-syariah', \App\Http\Controllers\Providers\DuhaController::class);
    Route::resource('bca', \App\Http\Controllers\Providers\BcaController::class);
    Route::resource('baf', \App\Http\Controllers\Providers\BafController::class);
});
