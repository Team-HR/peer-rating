<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\PeerRatingDepartment;
use App\Models\PeerRatingOffice;
use App\Models\PeerRatingOfficePeer;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PeerRatingController extends Controller
{
    public function index()
    {

        $depts = PeerRatingDepartment::all()->sortByDesc('id');
        $departments = [];
        foreach ($depts as $department) {
            $departments[] = [
                'id' => $department->id,
                'name' => $department->name
            ];
        }
        return Inertia::render("PeerRating/Index", ['departments' => $departments]);
    }


    public function offices($department_id)
    {
        $department = PeerRatingDepartment::find($department_id);
        $department = $department->name;
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->orderByDesc('id')->get();
        return Inertia::render("PeerRating/Offices", ['department_id' => $department_id, 'department' => $department, 'offices' => $offices]);
    }

    public function create_department(Request $request)
    {

        $department = new PeerRatingDepartment;
        $department->name = $request->department;
        $department->short_name = $request->department;
        $department->is_complete = 0;
        $department->save();

        $depts = PeerRatingDepartment::all()->sortByDesc('id');
        $departments = [];
        foreach ($depts as $department) {
            $departments[] = [
                'id' => $department->id,
                'name' => $department->name
            ];
        }
        return Inertia::render("PeerRating/Index", ['departments' => $departments]);
    }


    public function files($department_id)
    {
        // $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->orderByDesc('id')->get();
        // return Inertia::render("PeerRating/Files", ['department_id' => $department_id, 'office_id' => $office_id]);
        $department = PeerRatingDepartment::find($department_id);
        $department = $department->name;
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->orderByDesc('id')->get();
        return Inertia::render("PeerRating/Files", ['department_id' => $department_id, 'department' => $department, 'offices' => $offices]);
    }

    public function file_peer_ratings($department_id)
    {
        $department = PeerRatingDepartment::find($department_id);
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->orderByDesc('id')->get();
        return Inertia::render("PeerRating/Filetypes/PeerRatings", ['department' => $department, 'offices' => $offices]);
    }

    public function file_peer_ratings_create_office(Request $request)
    {

        $office = new PeerRatingOffice();
        $office->peer_rating_department_id = $request->department["id"];
        $office->name = $request->name;
        $office->is_complete = 0;
        $office->save();

        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $request->department["id"])->orderByDesc('id')->get();
        return Inertia::render("PeerRating/Filetypes/PeerRatings", ['department' => $request->department, 'offices' => $offices]);
    }

    public function file_peers($department_id, $office_id)
    {
        $employees = Employee::orderBy('last_name')->get();
        foreach ($employees as $key => $employee) {
            $employees[$key]["full_name"] = $employee->full_name;
        }
        // return $employees;
        $peers = PeerRatingOfficePeer::where("office_id", "=", $office_id)->get();

        foreach ($peers as $key => $peer) {
            $peers[$key] ["full_name"] = $peer->full_name;
        }

        $department = PeerRatingDepartment::find($department_id);
        $office = PeerRatingOffice::find($office_id);
        return Inertia::render("PeerRating/Filetypes/Peers", ['employees' => $employees,'department' => $department, 'office' => $office, "peers" => $peers]);
    }

    public function file_peers_add_peer(Request $request)
    {
        $peer = new PeerRatingOfficePeer();
        $peer->office_id = $request->office["id"];
        $peer->employee_id = $request->employee["id"];
        $peer->save();

        $peers = PeerRatingOfficePeer::where("office_id", "=", $request->office["id"])->get();
        return Inertia::render("PeerRating/Filetypes/Peers", ['department' => $request->department, 'office' => $request->office, "peers" => $peers]);
        // $this->file_peers($request->department);
    }

    public function file_peer_rating($department_id, $office_id, $peer_id)
    {

        // test start
        $peer = [
            "id" => 1,
            "office_id" => 2,
            "employee_id" => 9,
            "employee_id_rater" => 2564,
            "name" => "VALENCIA, FRANZ JOSHUA A.",
            "criteria_0" => 25,
            "criteria_1" => 15,
            "criteria_2" => 5,
            "criteria_3" => 20
        ];

        // return array_merge(["peer" => $peer], $this->get_department_office($department_id, $office_id));
        // test end
        return Inertia::render("PeerRating/Filetypes/PeerRating", array_merge(["peer" => $peer], $this->get_department_office($department_id, $office_id)));
    }

    public  function get_department_office($department_id, $office_id)
    {
        $department = PeerRatingDepartment::find($department_id);
        $office = PeerRatingOffice::find($office_id);
        $data = [
            "department" => $department,
            "office" => $office,
        ];
        return $data;
    }
}
