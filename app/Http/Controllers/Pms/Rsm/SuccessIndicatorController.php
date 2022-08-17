<?php

namespace App\Http\Controllers\Pms\Rsm;

use App\Http\Controllers\Controller;
use App\Models\PmsRatingScaleMatrix;
use App\Models\PmsRatingScaleMatrixSuccessIndicator;
use App\Models\SysEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SuccessIndicatorController extends Controller
{
    public function index($period_id, $rsm_id)
    {
        // $periods = PmsPeriod::all();
        // foreach ($periods as $key => $period) {
        //     $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        // }

        // $parents = [];
        $mfo = PmsRatingScaleMatrix::find($rsm_id);
        $sys_employees = SysEmployee::orderBy('last_name')->get();

        $success_indicators = [];
        return Inertia::render("Pms/RatingScaleMatrix/SuccessIndicator", ["employees" => $sys_employees, "mfo" => $mfo, "success_indicators" => $success_indicators]);
    }

    public function create($period, $rsm_id, Request $request)
    {
        $success_indicator = new PmsRatingScaleMatrixSuccessIndicator;
        $success_indicator->pms_rating_scale_matrix_id = $rsm_id;
        $success_indicator->index = 0;
        $success_indicator->success_indicator = $request->success_indicator;
        $success_indicator->quality = $request->quality;
        $success_indicator->efficiency = $request->efficiency;
        $success_indicator->timeliness = $request->timeliness;
        $in_charges = [];
        foreach ($request->in_charges as $emp) {
            $in_charges[] = $emp["id"];
        }
        if (count($request->in_charges) > 0) {
            $success_indicator->in_charges = $in_charges;
        } else {
            $success_indicator->in_charges = NULL;
        }
        $success_indicator->save();
        return Redirect::back();
    }

    public function update($period_id, $rsm_id, $id)
    {
        $mfo = PmsRatingScaleMatrix::find($rsm_id);
        $sys_employees = SysEmployee::orderBy('last_name')->get();
        $success_indicator = PmsRatingScaleMatrixSuccessIndicator::find($id);
        // return $success_indicator;
        return Inertia::render("Pms/RatingScaleMatrix/SuccessIndicator", ["employees" => $sys_employees, "mfo" => $mfo, "success_indicator" => $success_indicator]);
    }

    public function destroy($period_id, $rsm_id, $id)
    {
        // return $id;
        $success_indicator = PmsRatingScaleMatrixSuccessIndicator::find($id);
        $success_indicator->delete();
        return Redirect::back();
    }
}
