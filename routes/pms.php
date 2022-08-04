<?php
# PERFORMANCE MANAGEMENT SYSTEM
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

# pms dashboard
Route::get('/pms', function () {
    return Inertia::render('Pms/Index');
});


use App\Http\Controllers\Pms\RatingScaleMatrixController;
# rating scale matrix
Route::get('/pms/rsm', [RatingScaleMatrixController::class, "index"]);

Route::get('/pms/rsm/{period_id}', [RatingScaleMatrixController::class, "show"]);
