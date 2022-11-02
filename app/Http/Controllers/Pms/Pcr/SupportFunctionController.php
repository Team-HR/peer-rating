<?php

namespace App\Http\Controllers\Pms\Pcr;

use App\Http\Controllers\Controller;
use App\Models\Pms\Pcr\PmsPerformanceCommitmentReviewSupportFunction;
use App\Models\Pms\Pcr\PmsPerformanceCommitmentReviewSupportFunctionData;
use App\Models\PmsPerformanceCommitmentReviewStatus;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupportFunctionController extends Controller
{
    public function show($pms_period_id)
    {
        $period = PmsPeriod::find($pms_period_id);
        $rows = [];
        $sys_employee_id = auth()->user()->sys_employee_id;
        $rows = get_support_function_rows($sys_employee_id, $pms_period_id);
        return Inertia::render("Pms/Pcr/SupportFunctions", ["period" => $period, "rows" => $rows]);
    }
}

/**
 * 
 * Get all support functions with accomplishment from 
 * PmsPerformanceCommitmentReviewSupportFunctionData
 * with form type, pms_period_id and sys_employee_id
 * 
 * */

function get_support_function_rows($sys_employee_id, $pms_period_id)
{
    $data = [];
    $support_functions = get_support_functions($sys_employee_id, $pms_period_id);

    foreach ($support_functions as $key => $support_func) {
        $id = $support_func["id"];
        $support_func_data = PmsPerformanceCommitmentReviewSupportFunctionData::where('pms_performance_commitment_review_support_function_id', $id)->where('sys_employee_id', $sys_employee_id)->where('pms_period_id', $pms_period_id)->first();

        $support_func_data_id = null;
        $accomplishment = null;
        $quality = null;
        $efficiency = null;
        $timeliness = null;
        $average = null;
        $percent = 0;

        if ($support_func_data) {
            $support_func_data_id = $support_func_data["id"];
            $accomplishment = $support_func_data["accomplishment"];
            $quality = $support_func_data["quality"];
            $efficiency = $support_func_data["efficiency"];
            $timeliness = $support_func_data["timeliness"];
            $percent = $support_func_data["percent"];

            if ($percent != 0) {
                $count = 0;
                $total_scores = 0;
                if ($quality) {
                    $count++;
                    $total_scores += $quality;
                }
                if ($efficiency) {
                    $count++;
                    $total_scores += $efficiency;
                }
                if ($timeliness) {
                    $count++;
                    $total_scores += $timeliness;
                }
                if ($count > 0) {
                    $average = ($total_scores / $count) * $percent / 100;
                    $average = floatval(number_format($average, 3));
                }
            }
        }

        $datum = [
            "id" => $id,
            "support_func_data_id" => $support_func_data_id,
            "support_function" => $support_func["support_function"],
            "success_indicator" => $support_func["success_indicator"],
            "accomplishment" => $accomplishment,
            "quality" => $quality,
            "efficiency" => $efficiency,
            "timeliness" => $timeliness,
            "average" => $average,
            "percent" => $percent
        ];

        $data[] = $datum;
    }

    return $data;
}

/**
 * 
 * Get all support functions from 
 * PmsPerformanceCommitmentReviewSupportFunction
 * with form type, pms_period_id and sys_employee_id
 * 
 * */

function get_support_functions($sys_employee_id, $pms_period_id)
{
    // check form type from status
    $data = [];
    $pcr_status = PmsPerformanceCommitmentReviewStatus::where('sys_employee_id', $sys_employee_id)->where('pms_period_id', $pms_period_id)->first();
    // if no status not execute and return []
    if ($pcr_status) {
        $form_type = $pcr_status["form_type"];
        $support_functions = PmsPerformanceCommitmentReviewSupportFunction::where(
            'form_type',
            $form_type
        )->get();
        $data = $support_functions;
    }
    return $data;
}
