<?php

namespace App\Http\Controllers\Pms\Pcr;

use App\Http\Controllers\Controller;
use App\Models\PmsPerformanceCommitmentReviewStatus;
use App\Models\PmsPeriod;
use App\Models\PmsRatingScaleMatrix;
use App\Models\PmsRatingScaleMatrixAssignment;
use App\Models\PmsRatingScaleMatrixSuccessIndicator;
use App\Models\SysEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CoreFunctionController extends Controller
{

    public function show($period_id, $id)
    {
        $period = PmsPeriod::find($period_id);
        $sys_employee_id = auth()->user()->sys_employee_id;

        $assignments = PmsRatingScaleMatrixAssignment::where("period_id", $period_id)->where("sys_employee_id", $sys_employee_id)->get();

        # get the success indicator ids
        $success_indicator_ids = [];
        foreach ($assignments as $assignment) {
            $success_indicator_ids[] = $assignment->pms_rating_scale_matrix_success_indicator_id;
        }

        # get mfo ids
        $mfo_ids = [];
        foreach ($success_indicator_ids as $success_indicator_id) {
            $mfo = PmsRatingScaleMatrixSuccessIndicator::find($success_indicator_id);
            $mfo_id = $mfo->pms_rating_scale_matrix_id;
            if (!in_array($mfo_id, $mfo_ids)) {
                $mfo_ids[] = $mfo_id;
            }
        }

        // return $mfo_ids;
        # get mfo data and parents as well
        $mfos = [];
        foreach ($mfo_ids as $key => $mfo_id) {
            $mfo = PmsRatingScaleMatrix::find($mfo_id);
            $mfos[] = $mfo;
            $mfos = get_parent($mfos, $mfo->parent_id);
        }


        # get oredered rows
        $rows = [];

        # sort parents first start -- according to the alphanumeric code
        $sorted_codes = [];
        foreach ($mfos as $key => $mfo) {
            $sorted_codes[] = $mfo["code"];
        }
        natsort($sorted_codes);
        $sorted_pms_rating_scale_matrices = [];
        foreach ($sorted_codes as $code) {
            foreach ($mfos as $mfo) {
                if ($mfo["code"] == $code) {
                    $sorted_pms_rating_scale_matrices[] = $mfo;
                    continue;
                }
            }
        }
        # sort end


        foreach ($sorted_pms_rating_scale_matrices as $row) {
            $level = get_level(0, $row["parent_id"]);
            $rowspan = 0;
            $si_only = false;
            $success_indicators = get_success_indicators($row["id"]);
            $success_indicators_count = count($success_indicators);
            $rowspan = $success_indicators_count > 1 ? $success_indicators_count : 0;
            $datum = [
                "pms_rating_scale_matrix_id" => $row["id"],
                "parent_id" => $row["parent_id"],
                "level" => $level,
                "rowspan" => $rowspan,
                "mfo_only" => true,
                "si_only" => $si_only,
                "code" => $row["code"],
                "title" => $row["title"],
            ];

            # if no success indicators
            if ($success_indicators_count < 1) {
                $rows[] = $datum;
            } else {
                # if there is/are success indicators
                $datum["mfo_only"] = false;
                foreach ($success_indicators as $key => $success_indicator) {
                    if ($key > 0) {
                        $datum["si_only"] = true;
                    }

                    $quality = $success_indicator["quality"];
                    $efficiency = $success_indicator["efficiency"];
                    $timeliness = $success_indicator["timeliness"];

                    $performance_measures = [];

                    if ($quality) {
                        $performance_measures[] = "Quality";
                    }
                    if ($efficiency) {
                        $performance_measures[] = "Efficiency";
                    }
                    if ($timeliness) {
                        $performance_measures[] = "Timeliness";
                    }


                    $in_charges = PmsRatingScaleMatrixAssignment::where("pms_rating_scale_matrix_success_indicator_id", $success_indicator["id"])->get();

                    $success_indicator_datum = [
                        "pms_rating_scale_matrix_success_indicator_id" => $success_indicator["id"],
                        "success_indicator" => $success_indicator["success_indicator"],
                        "performance_measures" => $performance_measures,
                        "quality" => $quality,
                        "efficiency" => $efficiency,
                        "timeliness" => $timeliness,
                        "pms_performance_commitment_review_core_function_data" => null
                    ];
                    $rows[] = array_merge($datum, $success_indicator_datum);
                }
            }
        }

        // return Inertia::render("Pms/IndividualRatingScaleMatrix/IndividualRatingScaleMatrix", [
        //     "period" => $period, "rows" => $rows
        // ]);

        $period = PmsPeriod::find($period_id);
        // $employees = SysEmployee::orderBy('last_name')->get()->toArray();
        $form_status = PmsPerformanceCommitmentReviewStatus::find($id);

        return Inertia::render("Pms/Pcr/CoreFunctions", ["period" => $period, "form_status" => $form_status, "rows" => $rows]);
    }


    public function create_accomplishment($period_id, $id, Request $request) {
        return $request;
        return Redirect::back();
    }


}

function get_parent($mfos, $parent_id)
{
    $mfo = PmsRatingScaleMatrix::find($parent_id);
    $mfos[] = $mfo;
    if ($mfo->parent_id) {
        $mfos[] = get_parent($mfos, $mfo->parent_id);
    }
    return $mfos;
}

# get level iterator
function get_level($level = 0, $parent_id)
{
    $rsm = PmsRatingScaleMatrix::find($parent_id);
    if ($rsm) {
        $level = $level + 1;
        $level = get_level($level, $rsm["parent_id"]);
    }
    return $level;
}

# count rowspan 
function get_rowspan($id)
{
    $count = PmsRatingScaleMatrixSuccessIndicator::where("pms_rating_scale_matrix_id", $id)->count();
    return $count;
}

# get success indicators of the mfo/pap
function get_success_indicators($id)
{
    $pms_rating_scale_matrix_success_indicators = PmsRatingScaleMatrixSuccessIndicator::where("pms_rating_scale_matrix_id", $id)->get();
    return $pms_rating_scale_matrix_success_indicators;
}
