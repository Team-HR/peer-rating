<?php
# PERFORMANCE MANAGEMENT SYSTEM
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Pms\Rsm\RatingScaleMatrixController;
use App\Http\Controllers\Pms\Rsm\SuccessIndicatorController;
use App\Http\Controllers\Pms\Irsm\IndividualRatingScaleMatrixController;
use App\Http\Controllers\Pms\Pcr\PcrController;

# pms dashboard
Route::get('/pms', function () {
    return Inertia::render('Pms/Index');
})->middleware('auth');

# rating scale matrix
Route::get('/pms/rsm', [RatingScaleMatrixController::class, "index"])->middleware('auth');

Route::get('/pms/rsm/{period_id}', [RatingScaleMatrixController::class, "show"])->name("rsm.show");
Route::post('/pms/rsm/{period_id}', [RatingScaleMatrixController::class, "create"]);
Route::patch('/pms/rsm/{period_id}', [RatingScaleMatrixController::class, "update"]);
Route::delete('/pms/rsm/{period_id}/{id}', [RatingScaleMatrixController::class, "destroy"]);

# success indicator
Route::get('/pms/rsm/{period_id}/mfo/{id}/si', [SuccessIndicatorController::class, "index"]);
Route::post('/pms/rsm/{period_id}/mfo/{id}/si', [SuccessIndicatorController::class, "create"]);
Route::get('/pms/rsm/{period_id}/mfo/{rsm_id}/si/{id}', [SuccessIndicatorController::class, "edit"]);
Route::patch('/pms/rsm/{period_id}/mfo/{rsm_id}/si/{id}', [SuccessIndicatorController::class, "update"]);
Route::delete('/pms/rsm/{period_id}/mfo/{rsm_id}/si/{id}', [SuccessIndicatorController::class, "destroy"]);

# individual rating scale matrix
Route::get("/pms/irsm", [IndividualRatingScaleMatrixController::class, "index"]);
Route::get("/pms/irsm/{period_id}", [IndividualRatingScaleMatrixController::class, "show"]);

# pcr
Route::get("/pms/pcr", [PcrController::class, "index"]);
Route::get("/pms/pcr/{period_id}", [PcrController::class, "show"]);
