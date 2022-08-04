<?php
# PERFORMANCE MANAGEMENT SYSTEM
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/pms', function () {
    return Inertia::render('Pms/Index');
});
