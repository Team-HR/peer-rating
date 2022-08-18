<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PmsPeriod;
use App\Models\PmsRatingScaleMatrix;

class IndividualRatingScaleMatrixController extends Controller
{
    public function index()
    {
        $periods = PmsPeriod::all();
        foreach ($periods as $key => $period) {
            $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        }
        return Inertia::render("Pms/IndividualRatingScaleMatrix/Index", ["periods" => $periods]);
    }

    public function show($period_id)
    {
        $period = PmsPeriod::find($period_id);

        

        return Inertia::render("Pms/IndividualRatingScaleMatrix/IndividualRatingScaleMatrix", [
            "period" => $period
        ]);
    }
}
