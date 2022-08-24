<?php

namespace App\Http\Controllers\Pms\Pcr;

use App\Http\Controllers\Controller;
use App\Models\PmsPerformanceCommitmentReviewStatus;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PcrController extends Controller
{
    public function index()
    {
        $periods = PmsPeriod::all();
        foreach ($periods as $key => $period) {
            $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        }
        return Inertia::render("Pms/Pcr/Index", ["periods" => $periods]);
    }

    public function show($period_id)
    {
        $period = PmsPeriod::find($period_id);
        $sys_employee_id = auth()->user()->sys_employee_id;
        # get pms_performance_committment_review_status
        $form_status = PmsPerformanceCommitmentReviewStatus::where("pms_period_id", $period_id)->where("sys_employee_id", $sys_employee_id)->first();
        # if none create
        if (!$form_status) {
            $sys_employee_id = auth()->user()->sys_employee_id;
            $sys_department_id = auth()->user()->sys_department_id;
            $form = new PmsPerformanceCommitmentReviewStatus;
            $form->pms_period_id = $period_id;
            $form->sys_employee_id = $sys_employee_id;
            $form->sys_department_id = $sys_department_id;
            $form->save();
            $form_status = PmsPerformanceCommitmentReviewStatus::find($form->id);
        }
        return Inertia::render("Pms/Pcr/Status", ["period" => $period, "form_status" => $form_status]);
    }

    public function show_form_type($period_id, $id)
    {
        $period = PmsPeriod::find($period_id);
        $form_type = PmsPerformanceCommitmentReviewStatus::find($id);
        return Inertia::render("Pms/Pcr/FormType", ["period" => $period, "form_type" => $form_type]);
    }

    public function set_form_type($period_id, $id, Request $request)
    {
        $period = PmsPeriod::find($period_id);
        $form = PmsPerformanceCommitmentReviewStatus::find($id);
        $form->agency = $request->agency;
        $form->form_type = $request->form_type;
        $form->save();
        return Redirect::back();
    }

    public function show_signatories($period_id, $id)
    {
        $period = PmsPeriod::find($period_id);
        $form_type = PmsPerformanceCommitmentReviewStatus::find($id);
        return Inertia::render("Pms/Pcr/Signatories", ["period" => $period, "form_type" => $form_type]);
    }
}
