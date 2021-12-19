<?php

use App\Http\Controllers\Api\V1\Admin\AppointmentApiController;
use App\Http\Controllers\Api\V1\Admin\BahagianApiController;
use App\Http\Controllers\Api\V1\Admin\MasaTemuJanjiApiController;
use App\Http\Controllers\Api\V1\Admin\PerkhidmatanApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Appointment
    Route::apiResource('appointments', AppointmentApiController::class);

    // Bahagian
    Route::apiResource('bahagians', BahagianApiController::class);

    // Masa Temu Janji
    Route::apiResource('masa-temu-janjis', MasaTemuJanjiApiController::class);

    // Perkhidmatan
    Route::apiResource('perkhidmatans', PerkhidmatanApiController::class);
});
