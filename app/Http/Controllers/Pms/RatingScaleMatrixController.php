<?php

namespace App\Http\Controllers\Pms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RatingScaleMatrixController extends Controller
{
    public function index()
    {
        return Inertia::render('Pms/RatingScaleMatrix/Index');
    }
    public function show($period_id)
    {   
        return Inertia::render('Pms/RatingScaleMatrix/RatingScaleMatrix', ['period_id' => $period_id]);
    }
}
