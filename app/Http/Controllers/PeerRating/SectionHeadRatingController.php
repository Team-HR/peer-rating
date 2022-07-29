<?php

namespace App\Http\Controllers\PeerRating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

use App\Models\Employee;
use App\Models\PeerRating\PeerRatingDepartment;
use App\Models\PeerRating\PeerRatingOffice;
use App\Models\PeerRating\PeerRatingOfficePeer;
use App\Models\PeerRating\PeerRatingSection;
use App\Models\PeerRating\PeerRatingSectionPeer;

class SectionHeadRatingController extends Controller
{
    public function index($department_id)
    {
        $employees = Employee::orderBy('last_name')->get()->toArray();
        $sections = PeerRatingSection::where('department_id', $department_id)->get();

        $depts = PeerRatingDepartment::all();
        $departments = [];
        foreach ($depts as $department) {
            $departments[] = [
                'id' => $department->id,
                'name' => $department->name
            ];
        }
        $department = PeerRatingDepartment::find($department_id);
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->get();
        return Inertia::render("PeerRating/SectionHeadRating/Index", ['employees' => $employees, 'department' => $department, 'offices' => $offices, 'sections' => $sections]);
    }


    public function create($department_id, Request $request)
    {
        // return $request;
        if (!isset($request->office["id"])) return $this->index($department_id);
        $section = new PeerRatingSection;
        $section->department_id = $department_id;
        $section->name = $request->name;
        $section->employee_id_supervisor = isset($request->supervisor["id"]) ? $request->supervisor["id"] : null;
        $section->office_id = isset($request->office["id"]) ? $request->office["id"] : null;
        $section->save();

        return $this->index($department_id);
    }

    public function section_head_rating($department_id, $section_id)
    {
        $is_complete = false;

        $employees = Employee::orderBy('last_name')->get()->toArray();
        $department = PeerRatingDepartment::find($department_id);
        $section = PeerRatingSection::find($section_id);

        if ($section["is_complete"]) {
            $is_complete = true;
        }

        $office = PeerRatingOffice::find($section->office_id);
        $ratees = PeerRatingSectionPeer::where('section_id', $section->id)->orderBy('index')->get();
        foreach ($ratees as $index => $ratee) {
            foreach ($employees as $i => $employee) {
                if ($ratee['employee_id'] == $employee['id']) {
                    array_splice($employees, $i, 1);
                }
            }
        }
        // return $ratees;



        return Inertia::render('PeerRating/SectionHeadRating/SectionHeadRating', ['is_complete' => $is_complete, 'employees' => $employees, '$department' => $department, 'office' => $office, 'section' => $section, 'ratees' => $ratees]);
    }

    public function section_head_rating_add_peer($department_id, $section_id, Request $request)
    {
        $index = 0;
        $peers = PeerRatingSectionPeer::where('section_id', $section_id)->get();

        $count = count($peers);
        if ($count > 0) {
            $peer = PeerRatingSectionPeer::where('section_id', $section_id)->orderByDesc('index')->first();
            $index = $peer->index + 1;
        }

        $peer = new PeerRatingSectionPeer;
        $peer->section_id = $section_id;
        $peer->employee_id = $request->employee["id"];
        $peer->criteria_0 = 0;
        $peer->criteria_1 = 0;
        $peer->criteria_2 = 0;
        $peer->criteria_3 = 0;
        $peer->index = $index;
        $peer->save();
        return $this->section_head_rating($department_id, $section_id);
    }

    public function section_head_rating_remove_peer($department_id, $section_id, $id)
    {
        $peer = PeerRatingSectionPeer::find($id);
        $peer->delete();
        return Redirect::route('section_head_rating', [$department_id, $section_id], 303);
    }

    public function section_head_rating_save($department_id, $section_id, Request $request)
    {
        $ratees = $request->toArray();
        foreach ($ratees as $ratee) {
            $peer = PeerRatingSectionPeer::find($ratee["id"]);
            $peer->criteria_0 = $ratee["criteria_0"];
            $peer->criteria_1 = $ratee["criteria_1"];
            $peer->criteria_2 = $ratee["criteria_2"];
            $peer->criteria_3 = $ratee["criteria_3"];
            $peer->save();
        }

        $section = PeerRatingSection::find($section_id);
        $section->is_complete = true;
        $section->save();

        return $this->section_head_rating($department_id, $section_id);
    }
}
