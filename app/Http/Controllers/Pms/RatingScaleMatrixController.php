<?php

namespace App\Http\Controllers\Pms;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RatingScaleMatrixController extends Controller
{
    public function index()
    {
        $periods = PmsPeriod::all();
        foreach ($periods as $key => $period) {
            $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        }
        return Inertia::render('Pms/RatingScaleMatrix/Index', ['periods' => $periods]);
    }
    public function show($period_id)
    {
        return Inertia::render('Pms/RatingScaleMatrix/RatingScaleMatrix', ['period_id' => $period_id]);
    }
}
