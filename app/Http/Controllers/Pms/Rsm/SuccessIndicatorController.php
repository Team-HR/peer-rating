<?php

namespace App\Http\Controllers\Pms\Rsm;

use App\Http\Controllers\Controller;
use App\Models\PmsRatingScaleMatrix;
use App\Models\SysEmployee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SuccessIndicatorController extends Controller
{
    public function index($period_id, $id)
    {
        // $periods = PmsPeriod::all();
        // foreach ($periods as $key => $period) {
        //     $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        // }

        // $parents = [];
        $mfo = PmsRatingScaleMatrix::find($id);
        $sys_employees = SysEmployee::orderBy('last_name')->get();

        $success_indicators = [];
        return Inertia::render("Pms/RatingScaleMatrix/SuccessIndicator", ["employees" => $sys_employees, "mfo" => $mfo, "success_indicators" => $success_indicators]);
    }
}
