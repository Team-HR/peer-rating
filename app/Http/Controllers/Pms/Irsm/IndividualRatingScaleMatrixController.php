<?php

namespace App\Http\Controllers\Pms\Irsm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PmsPeriod;
use App\Models\Pms\Rsm\PmsRsm;
use App\Models\Pms\Rsm\PmsRsmAssignment;
use App\Models\Pms\Rsm\PmsRsmSuccessIndicator;

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
        $sys_employee_id = auth()->user()->sys_employee_id;

        $assignments = PmsRsmAssignment::where("period_id", $period_id)->where("sys_employee_id", $sys_employee_id)->get();

        # get the success indicator ids
        $success_indicator_ids = [];
        foreach ($assignments as $assignment) {
            $success_indicator_ids[] = $assignment->pms_rating_scale_matrix_success_indicator_id;
        }


        # get mfo ids
        $mfo_ids = [];
        foreach ($success_indicator_ids as $success_indicator_id) {
            $mfo = PmsRsmSuccessIndicator::find($success_indicator_id);
            $mfo_id = $mfo->pms_rating_scale_matrix_id;
            if (!in_array($mfo_id, $mfo_ids)) {
                $mfo_ids[] = $mfo_id;
            }
        }

        // return $mfo_ids;
        # get mfo data and parents as well
        $mfos = [];
        foreach ($mfo_ids as $key => $mfo_id) {
            $mfo = PmsRsm::find($mfo_id);
            $mfos[] = $mfo;
            $mfos = get_parent($mfos, $mfo->parent_id);
        }

        // return $mfos;
        # get oredered rows
        $rows = [];

        # sort parents first start -- according to the alphanumeric code
        $sorted_codes = [];
        foreach ($mfos as $key => $mfo) {
            $sorted_codes[] = $mfo["code"];
        }
        natsort($sorted_codes);
        // return $mfos;
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

        // return $sorted_pms_rating_scale_matrices;
        foreach ($sorted_pms_rating_scale_matrices as $row) {
            $level = get_level(0, $row["parent_id"]);
            $rowspan = 0;
            $si_only = false;
            $success_indicators = get_success_indicators($row["id"]);
            $success_indicators_count = count($success_indicators);
            $rowspan = $success_indicators_count > 1 ? $success_indicators_count : 0;
            $datum = [
                "id" => $row["id"],
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


                    $in_charges = PmsRsmAssignment::where("pms_rating_scale_matrix_success_indicator_id", $success_indicator["id"])->get();

                    $success_indicator_datum = [
                        "success_indicator_id" => $success_indicator["id"],
                        "success_indicator" => $success_indicator["success_indicator"],
                        "performance_measures" => $performance_measures,
                        "quality" => $quality,
                        "efficiency" => $efficiency,
                        "timeliness" => $timeliness,
                        // "in_charges" => get_incharges($in_charges)
                    ];
                    $rows[] = array_merge($datum, $success_indicator_datum);
                }
            }
        }

        return Inertia::render("Pms/IndividualRatingScaleMatrix/IndividualRatingScaleMatrix", [
            "period" => $period, "rows" => $rows
        ]);
    }
}

function get_parent($mfos, $parent_id)
{
    $mfo = PmsRsm::find($parent_id);
    $mfos[] = $mfo;
    if ($mfo->parent_id) {
        $mfos[] = get_parent($mfos, $mfo->parent_id);
    }
    return $mfos;
}

# get level iterator
function get_level($level = 0, $parent_id)
{
    $rsm = PmsRsm::find($parent_id);
    if ($rsm) {
        $level = $level + 1;
        $level = get_level($level, $rsm["parent_id"]);
    }
    return $level;
}

# count rowspan 
function get_rowspan($id)
{
    $count = PmsRsmSuccessIndicator::where("pms_rating_scale_matrix_id", $id)->count();
    return $count;
}

# get success indicators of the mfo/pap
function get_success_indicators($id)
{
    $pms_rating_scale_matrix_success_indicators = PmsRsmSuccessIndicator::where("pms_rating_scale_matrix_id", $id)->get();
    return $pms_rating_scale_matrix_success_indicators;
}
