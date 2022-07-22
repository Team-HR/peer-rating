<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\PeerRatingDepartment;
use App\Models\PeerRatingOffice;
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
    public function create_office(Request $request)
    {
        // return $request->all();
        $office = new PeerRatingOffice();
        $office->peer_rating_department_id = $request->department_id;
        $office->name = $request->name;
        $office->is_complete = 0;
        $office->save();

        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $request->department_id)->orderByDesc('id')->get();
        return Inertia::render("PeerRating/Offices", ['department_id' => $request->department_id, 'offices' => $offices]);
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

    public function file_peer_rating($department_id) 
    {
        return Inertia::render("PeerRating/Filetypes/PeerRating");
    } 
}
