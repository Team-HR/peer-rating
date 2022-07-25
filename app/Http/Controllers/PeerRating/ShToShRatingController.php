<?php

namespace App\Http\Controllers\PeerRating;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

use App\Models\PeerRatingDepartment;
use App\Models\PeerRatingSectionHead;
use App\Models\PeerRatingSectionHeadForm;

class ShToShRatingController extends Controller
{
    public function index($department_id)
    {

        $department = PeerRatingDepartment::find($department_id);
        $employees = Employee::orderBy('last_name')->get()->toArray();
        $ratees = PeerRatingSectionHead::where('department_id', $department_id)->get();

        foreach ($ratees as $key => $peer) {
            # getting peer rating scores     
            $scores = PeerRatingSectionHeadForm::where('peer_rating_section_head_id', $peer["id"])->get(['criteria_0', 'criteria_1', 'criteria_2', 'criteria_3']);
            $total_scores = 0;
            $peer_rating = 0;
            foreach ($scores as $score) {
                $total_scores += $score["criteria_0"];
                $total_scores += $score["criteria_1"];
                $total_scores += $score["criteria_2"];
                $total_scores += $score["criteria_3"];
            }
            if (count($ratees) > 1) {
                $peer_rating = $total_scores / (count($ratees) - 1);
            }
            $ratees[$key]["rating"] = $peer_rating;


            foreach ($employees as $e => $employee) {
                if ($employee['id'] == $peer['employee_id']) {
                    array_splice($employees, $e, 1);
                }
            }
        }

        return Inertia::render('PeerRating/ShToShRating/Index', ['department' => $department, 'employees' => $employees, 'ratees' => $ratees]);
    }

    public function create($department_id, Request $request)
    {

        $index = 0;
        $peers = PeerRatingSectionHead::where('department_id', $department_id)->get();

        $count = count($peers);
        if ($count > 0) {
            $peer = PeerRatingSectionHead::where('department_id', $department_id)->orderByDesc('index')->first();
            $index = $peer->index + 1;
        }


        $peer = new PeerRatingSectionHead();
        $peer->department_id = $department_id;
        $peer->employee_id = $request->employee["id"];
        $peer->index = $index;
        $peer->save();
        // return $request;
        return Redirect::back();
    }

    public function destroy($department_id, $id)
    {
        $peer = PeerRatingSectionHead::find($id);
        $peer->delete();

        PeerRatingSectionHeadForm::where('peer_rating_section_head_id', $id)->delete();
        PeerRatingSectionHeadForm::where('peer_rating_section_head_id_rater', $id)->delete();

        return Redirect::back();
    }

    public function section_head_to_section_head_rating($department_id, $id)
    {

        $is_complete = false;
        $rater = PeerRatingSectionHead::find($id);
        $department = PeerRatingDepartment::find($department_id);
        #check first if rater already had rated his peers
        $count = PeerRatingSectionHeadForm::where('peer_rating_section_head_id_rater', $id)->count();

        // return $count;
        if ($count > 0) {
            $section_heads = PeerRatingSectionHead::where('department_id', $department_id)->orderBy('index')->get()->toArray();
            foreach ($section_heads as $section_head) {
                $peer_rating_peer_form =  PeerRatingSectionHeadForm::where('peer_rating_section_head_id',  $section_head['id'])->where('peer_rating_section_head_id_rater', $id)->first();
                if ($peer_rating_peer_form) {
                    $ratees[] = [
                        "id" => $section_head['id'],
                        "full_name" => $section_head["full_name"],
                        "peer_rating_section_head_id" => $section_head['id'],
                        "peer_rating_section_head_id_rater" => $id,
                        "criteria_0" => $peer_rating_peer_form['criteria_0'],
                        "criteria_1" => $peer_rating_peer_form['criteria_1'],
                        "criteria_2" => $peer_rating_peer_form['criteria_2'],
                        "criteria_3" => $peer_rating_peer_form['criteria_3'],
                    ];
                } else {
                    $ratees[] = [
                        "id" => $section_head['id'],
                        "full_name" => $section_head["full_name"],
                        "peer_rating_section_head_id" => $section_head['id'],
                        "peer_rating_section_head_id_rater" => $id,
                        "criteria_0" => 0,
                        "criteria_1" => 0,
                        "criteria_2" => 0,
                        "criteria_3" => 0
                    ];
                }
            }

            $is_complete = true;
        } else {
            $section_heads = PeerRatingSectionHead::where('department_id', $department_id)->orderBy('index')->get()->toArray();
            foreach ($section_heads as $section_head) {
                $ratees[] = [
                    "id" => $section_head['id'],
                    "full_name" => $section_head["full_name"],
                    "peer_rating_section_head_id" => $section_head['id'],
                    "peer_rating_section_head_id_rater" => $id,
                    "criteria_0" => 0,
                    "criteria_1" => 0,
                    "criteria_2" => 0,
                    "criteria_3" => 0
                ];
            }
        }


        return Inertia::render("PeerRating/ShToShRating/ShToShRating", ['is_complete' => $is_complete, 'rater' => $rater, 'ratees' => $ratees, 'department' => $department]);
    }

    public function section_head_to_section_head_rating_save($department_id, $id, Request $request)
    {

        $ratees = $request->toArray();
        foreach ($ratees as $ratee) {
            if ($ratee["peer_rating_section_head_id"] != $id) {
                # check if ratee is already rated if so update
                $form = PeerRatingSectionHeadForm::where('peer_rating_section_head_id', $ratee["peer_rating_section_head_id"])->where('peer_rating_section_head_id_rater', $id)->update([
                    "criteria_0" => $ratee["criteria_0"],
                    "criteria_1" => $ratee["criteria_1"],
                    "criteria_2" => $ratee["criteria_2"],
                    "criteria_3" => $ratee["criteria_3"]
                ]);
                # else
                if (!$form) {
                    $form = new PeerRatingSectionHeadForm;
                    $form->peer_rating_section_head_id = $ratee["peer_rating_section_head_id"];
                    $form->peer_rating_section_head_id_rater = $id;
                    $form->criteria_0 = $ratee["criteria_0"];
                    $form->criteria_1 = $ratee["criteria_1"];
                    $form->criteria_2 = $ratee["criteria_2"];
                    $form->criteria_3 = $ratee["criteria_3"];
                    $form->save();
                }
            }
        }
        return Redirect::back();
    }
}
