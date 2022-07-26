<?php

namespace App\Http\Controllers\PeerRating;

use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\PeerRatingDepartment;
use App\Models\PeerRatingOffice;
use App\Models\PeerRatingOfficePeer;
use App\Models\PeerRatingPeerForm;
use App\Models\PeerRatingSection;
use App\Models\PeerRatingSectionHead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class PeerRatingController extends Controller
{
    public function index()
    {

        $depts = PeerRatingDepartment::all();
        $departments = [];
        foreach ($depts as $department) {
            $departments[] = [
                'id' => $department->id,
                'name' => $department->name
            ];
        }
        return Inertia::render("PeerRating/Index", ['departments' => $departments]);
    }

    public function create_department(Request $request)
    {

        $department = new PeerRatingDepartment;
        $department->name = $request->department;
        $department->short_name = $request->department;
        $department->is_complete = 0;
        $department->save();

        $depts = PeerRatingDepartment::all();
        $departments = [];
        foreach ($depts as $department) {
            $departments[] = [
                'id' => $department->id,
                'name' => $department->name
            ];
        }

        return $this->index();
    }

    public function files($department_id)
    {
        // $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->orderByDesc('id')->get();
        // return Inertia::render("PeerRating/Files", ['department_id' => $department_id, 'office_id' => $office_id]);
        $department = PeerRatingDepartment::find($department_id);
        $department = $department->name;
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->get();


        # get all reports
        $reports = [
            /*
            [
                "id" => 1,
                "office" => "CBO",
                "peers" => [
                    [
                        "name" => "Franz Joshua Valencia",
                        "peer_rating" => 98,
                        "section_head_rating" => 89,
                        "section_head_to_section_head_rating" => 97,
                        "total_rating" => 78
                    ],
                    [
                        "name" => "Jane Doe",
                        "peer_rating" => 99,
                        "section_head_rating" => 88,
                        "section_head_to_section_head_rating" => 96,
                        "total_rating" => 78
                    ]
                ]
            ]
            */];



        $offices = PeerRatingOffice::where('peer_rating_department_id', $department_id)->get();

        foreach ($offices as $key => $office) {
            $reports[] = [
                'id' => $office['id'],
                'office' => $office['name'],
                'peers' => $this->get_peers($department_id, $office['id'])
            ];
        }

        return Inertia::render("PeerRating/Files", ['reports' => $reports, 'department_id' => $department_id, 'department' => $department, 'offices' => $offices]);
    }

    # get list of peers for report
    private function get_peers($department_id, $office_id)
    {

        $peers = PeerRatingOfficePeer::where('office_id', $office_id)->get();

        $data = [];
        foreach ($peers as $key => $peer) {
            $data[] = [
                "name" => $peer->full_name,
                "peer_rating" => $this->get_peer_rating($office_id, $peer->id),
                "section_head_rating" => $this->get_section_head_rating($office_id, $peer->employee_id),
                "section_head_to_section_head_rating" => $this->get_section_head_to_section_head_rating($department_id, $peer->employee_id),
                "total_rating" => NULL
            ];
        }
        return $data;
    }

    # get individual's peer rating
    private function get_peer_rating($office_id, $peer_rating_office_peer_id)
    {
        $count_peers = PeerRatingOfficePeer::where('office_id', $office_id)->count();
        if ($count_peers == 0) return NULL;
        $count_peers = $count_peers - 1;
        $peer_rating_peer_forms = PeerRatingPeerForm::where('peer_rating_office_peer_id', $peer_rating_office_peer_id)->get(['criteria_0', 'criteria_1', 'criteria_2', 'criteria_3']);

        $total_rating = 0;
        foreach ($peer_rating_peer_forms as $form) {
            $total_rating += $form->criteria_0;
            $total_rating += $form->criteria_1;
            $total_rating += $form->criteria_2;
            $total_rating += $form->criteria_3;
        }

        return $total_rating / $count_peers;
    }

    # get individual's section head rating
    private function get_section_head_rating($office_id, $employee_id)
    {
        // $office_id = 1;
        $data = DB::table('peer_rating_sections')
            // ->leftJoin('peer_rating_section_peers', 'peer_rating_sections.id', '=', 'peer_rating_section_peers.section_id')
            ->join('peer_rating_section_peers', function ($join) use ($office_id, $employee_id) {
                $join->on('peer_rating_sections.id', '=', 'peer_rating_section_peers.section_id')
                    ->where('peer_rating_sections.office_id', '=', $office_id)
                    ->where('peer_rating_section_peers.employee_id', '=', $employee_id);
            })
            ->get(['criteria_0', 'criteria_1', 'criteria_2', 'criteria_3']);

        $total_rating = 0;
        if (count($data) < 1) {
            $total_rating = NULL;
        }

        foreach ($data as $datum) {
            $total_rating += $datum->criteria_0;
            $total_rating += $datum->criteria_1;
            $total_rating += $datum->criteria_2;
            $total_rating += $datum->criteria_3;
        }

        return $total_rating;
    }

    # get individual's section head to section head rating
    private function get_section_head_to_section_head_rating($department_id, $employee_id)
    {
        $data = DB::table('peer_rating_section_heads')
            // ->leftJoin('peer_rating_section_peers', 'peer_rating_sections.id', '=', 'peer_rating_section_peers.section_id')
            ->join('peer_rating_section_head_forms', function ($join) use ($department_id, $employee_id) {
                $join->on('peer_rating_section_heads.id', '=', 'peer_rating_section_head_forms.peer_rating_section_head_id')
                    ->where('peer_rating_section_heads.department_id', '=', $department_id)
                    ->where('peer_rating_section_heads.employee_id', '=', $employee_id);
            })
            // ->count();
            ->get(['criteria_0', 'criteria_1', 'criteria_2', 'criteria_3']);


        $total_rating = 0;

        $count_peers = PeerRatingSectionHead::where('department_id', $department_id)->count();
        if ($count_peers == 0) return NULL;
        $count_peers = $count_peers - 1;

        if (count($data) < 1) {
            return NUll;
        }

        foreach ($data as $datum) {
            $total_rating += $datum->criteria_0;
            $total_rating += $datum->criteria_1;
            $total_rating += $datum->criteria_2;
            $total_rating += $datum->criteria_3;
        }

        return $total_rating / $count_peers;
    }


    public function file_peer_ratings($department_id)
    {
        $department = PeerRatingDepartment::find($department_id);
        $offices = PeerRatingOffice::where('peer_rating_department_id', '=', $department_id)->get();
        return Inertia::render("PeerRating/Filetypes/PeerRatings", ['department' => $department, 'offices' => $offices]);
    }

    public function file_peer_ratings_create_office(Request $request)
    {
        $office = new PeerRatingOffice();
        $office->peer_rating_department_id = $request->department["id"];
        $office->name = $request->name;
        $office->is_complete = 0;
        $office->save();

        return $this->file_peer_ratings($request->department["id"]);
    }

    public function file_peers($department_id, $office_id)
    {
        $employees = Employee::orderBy('last_name')->get()->toArray();
        $peers = PeerRatingOfficePeer::where("office_id", "=", $office_id)->orderBy('index')->get();
        foreach ($peers as $index => $peer) {
            # getting peer rating scores     
            $scores = PeerRatingPeerForm::where('peer_rating_office_peer_id', $peer["id"])->get(['criteria_0', 'criteria_1', 'criteria_2', 'criteria_3']);
            $total_scores = 0;
            $peer_rating = 0;
            foreach ($scores as $score) {
                $total_scores += $score["criteria_0"];
                $total_scores += $score["criteria_1"];
                $total_scores += $score["criteria_2"];
                $total_scores += $score["criteria_3"];
            }
            if (count($peers) > 1) {
                $peer_rating = $total_scores / (count($peers) - 1);
            }
            $peers[$index]["rating"] = $peer_rating;
            foreach ($employees as $i => $employee) {
                if ($peer['employee_id'] == $employee['id']) {
                    array_splice($employees, $i, 1);
                }
            }

            # check if rater completed rating
            $is_complete = false;
            $count_rated = PeerRatingPeerForm::where('peer_rating_office_peer_id_rater', $peer["id"])->count();
            $count_peers = PeerRatingOfficePeer::where('office_id', $office_id)->count();
            if ($count_peers - 1 == $count_rated) {
                $is_complete = true;
            }
            $peers[$index]["is_complete"] = $is_complete;
        }
        $department = PeerRatingDepartment::find($department_id);
        $office = PeerRatingOffice::find($office_id);
        return Inertia::render("PeerRating/Filetypes/Peers", ['employees' => $employees, 'department' => $department, 'office' => $office, "peers" => $peers]);
    }

    public function file_peers_add_peer(Request $request)
    {
        $index = 0;
        $peers = PeerRatingOfficePeer::where('office_id', '=', $request->office['id'])->get();

        $count = count($peers);
        if ($count > 0) {
            $peer = PeerRatingOfficePeer::where('office_id', '=', $request->office['id'])->orderByDesc('index')->first();
            $index = $peer->index + 1;
        }


        $peer = new PeerRatingOfficePeer();
        $peer->office_id = $request->office["id"];
        $peer->employee_id = $request->employee["id"];
        $peer->index = $index;
        $peer->save();

        return Redirect::route('peers', [$request->department["id"], $request->office["id"]], 303);
    }

    public function file_peers_remove_peer($department_id, $office_id, $id)
    {
        $peer = PeerRatingOfficePeer::find($id);
        $peer->delete();

        PeerRatingPeerForm::where('peer_rating_office_peer_id', $id)->delete();
        PeerRatingPeerForm::where('peer_rating_office_peer_id_rater', $id)->delete();

        return Redirect::route('peers', [$department_id, $office_id], 303);
    }


    # peer rating form encoding
    public function file_peer_rating($department_id, $office_id, $peer_id)
    {
        $is_complete = false;
        $rater = PeerRatingOfficePeer::find($peer_id);
        $ratees = [];

        #check first rater already had rated his peers
        $count = PeerRatingPeerForm::where('peer_rating_office_peer_id_rater', $peer_id)->count();
        if ($count > 0) {
            $office_peers = PeerRatingOfficePeer::where('office_id', '=', $office_id)->orderBy('index')->get()->toArray();
            foreach ($office_peers as $emp) {
                $peer_rating_peer_form =  PeerRatingPeerForm::where('peer_rating_office_peer_id',  $emp['id'])->where('peer_rating_office_peer_id_rater',   $peer_id)->first();
                if ($peer_rating_peer_form) {
                    $ratees[] = [
                        "id" => $emp['id'],
                        "full_name" => $emp["full_name"],
                        "peer_rating_office_peer_id" => $emp['id'],
                        "peer_rating_office_peer_id_rater" => $peer_id,
                        "criteria_0" => $peer_rating_peer_form['criteria_0'],
                        "criteria_1" => $peer_rating_peer_form['criteria_1'],
                        "criteria_2" => $peer_rating_peer_form['criteria_2'],
                        "criteria_3" => $peer_rating_peer_form['criteria_3'],
                    ];
                } else {
                    $ratees[] = [
                        "id" => $emp['id'],
                        "full_name" => $emp["full_name"],
                        "peer_rating_office_peer_id" => $emp['id'],
                        "peer_rating_office_peer_id_rater" => $peer_id,
                        "criteria_0" => 0,
                        "criteria_1" => 0,
                        "criteria_2" => 0,
                        "criteria_3" => 0
                    ];
                }
            }

            $is_complete = true;
        } else {
            $office_peers = PeerRatingOfficePeer::where('office_id', '=', $office_id)->orderBy('index')->get()->toArray();
            foreach ($office_peers as $emp) {
                $ratees[] = [
                    "id" => $emp['id'],
                    "full_name" => $emp["full_name"],
                    "peer_rating_office_peer_id" => $emp['id'],
                    "peer_rating_office_peer_id_rater" => $peer_id,
                    "criteria_0" => 0,
                    "criteria_1" => 0,
                    "criteria_2" => 0,
                    "criteria_3" => 0
                ];
            }
        }

        $department = PeerRatingDepartment::find($department_id);
        $office = PeerRatingOffice::find($office_id);

        return Inertia::render("PeerRating/Filetypes/PeerRating", ["is_complete" => $is_complete, "rater" => $rater, "ratees" => $ratees, "department" => $department, "office" => $office]);
    }

    public function file_peer_rating_create($department_id, $office_id, $peer_id, Request $request)
    {
        $ratees = $request->toArray();
        foreach ($ratees as $ratee) {
            if ($ratee["peer_rating_office_peer_id"] != $peer_id) {
                # check if ratee is already rated if so update
                $form = PeerRatingPeerForm::where('peer_rating_office_peer_id', $ratee["peer_rating_office_peer_id"])->where('peer_rating_office_peer_id_rater', $peer_id)->update([
                    "criteria_0" => $ratee["criteria_0"],
                    "criteria_1" => $ratee["criteria_1"],
                    "criteria_2" => $ratee["criteria_2"],
                    "criteria_3" => $ratee["criteria_3"]
                ]);
                # else
                if (!$form) {
                    $form = new PeerRatingPeerForm;
                    $form->peer_rating_office_peer_id = $ratee["peer_rating_office_peer_id"];
                    $form->peer_rating_office_peer_id_rater = $peer_id;
                    $form->criteria_0 = $ratee["criteria_0"];
                    $form->criteria_1 = $ratee["criteria_1"];
                    $form->criteria_2 = $ratee["criteria_2"];
                    $form->criteria_3 = $ratee["criteria_3"];
                    $form->save();
                }
            }
        }
        return $this->file_peer_rating($department_id, $office_id, $peer_id);
        // return $this->file_peers($department_id, $office_id);
    }
}
