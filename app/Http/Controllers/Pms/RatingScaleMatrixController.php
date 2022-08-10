<?php

namespace App\Http\Controllers\Pms;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use App\Models\PmsRatingScaleMatrix;
use App\Models\PmsRatingScaleMatrixSuccessIndicator;
use App\Models\SysEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RatingScaleMatrixController extends Controller
{
    public function index()
    {
        $periods = PmsPeriod::all();
        foreach ($periods as $key => $period) {
            $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        }

        $parents = [];

        return Inertia::render('Pms/RatingScaleMatrix/Index', ['periods' => $periods]);
    }
    public function show($period_id)
    {
        $rows =  [
            [
                "id" => 2,
                "level" => 0,
                "index" => 0,
                "rowspan" => 0,
                "si_only" => false,
                "code" => "A.",
                "title" => "IHRIS Development",
                "success_indicator" => "100% of computer software and hardware maintained every month.",
                "performance_measure" => [
                    "Efficiency",
                    "Timeliness"
                ],
                "quality" => [],
                "efficiency" => [
                    [
                        "score" => 5,
                        "description" => "100%"
                    ],
                    [
                        "score" => 3,
                        "description" => "99%-90%"
                    ],
                    [
                        "score" => 1,
                        "description" => "Less than 90%"
                    ]
                ],
                "timeliness" => [
                    [
                        "score" => 5,
                        "description" => "Every month"
                    ],
                    [
                        "score" => 2,
                        "description" => "Not maintained every month"
                    ]
                ],
                "in_charges" => [
                    [
                        "id" => 9,
                        "fu_name" => "Franz Joshua A. Valencia"
                    ]
                ]
            ],
            [
                "id" => 8,
                "level" => 1,
                "index" => 1,
                "rowspan" => 2,
                "si_only" => false,
                "code" => "A.1",
                "title" => "Database Management",
                "success_indicator" => "Database accurately updated everyday.",
                "performance_measure" => [
                    "Quality",
                    "Timeliness"
                ],
                "quality" => [
                    [
                        "score" => 5,
                        "description" => "Accurately"
                    ],
                    [
                        "score" => 2,
                        "description" => "Not updated"
                    ]
                ],
                "efficiency" => [],
                "timeliness" => [
                    [
                        "score" => 5,
                        "description" => "Every day"
                    ],
                    [
                        "score" => 2,
                        "description" => "Not maintained everyday"
                    ]
                ],
                "in_charges" => [
                    [
                        "id" => 9,
                        "fu_name" => "Franz Joshua A. Valencia"
                    ]
                ]
            ],
            [
                "id" => 11,
                "level" => 1,
                "index" => 3,
                "rowspan" => 0,
                "si_only" => true,
                "code" => "A.1",
                "title" => "Database Management si_only",
                "success_indicator" => "100% of database accurately developed everyday.",
                "performance_measure" => [
                    "Quality",
                    "Timeliness"
                ],
                "quality" => [
                    [
                        "score" => 5,
                        "description" => "Accurately"
                    ],
                    [
                        "score" => 2,
                        "description" => "Not developed"
                    ]
                ],
                "efficiency" => [],
                "timeliness" => [
                    [
                        "score" => 5,
                        "description" => "Every day"
                    ],
                    [
                        "score" => 2,
                        "description" => "Not maintained everyday"
                    ]
                ],
                "in_charges" => [
                    [
                        "id" => 9,
                        "fu_name" => "Franz Joshua A. Valencia"
                    ]
                ]
            ]
        ];

        $sys_department_id = auth()->user()->sys_department_id;

        if (!$sys_department_id) {
            $rows = [];
        }
        $rows = [];
        $pms_rating_scale_matrices = PmsRatingScaleMatrix::where('period_id', $period_id)->where('sys_department_id', $sys_department_id)->orderBy('index')->get();

        foreach ($pms_rating_scale_matrices as $row) {
            $level = get_level(0, $row["parent_id"]);
            $rowspan = 0;
            $si_only = false;
            $success_indicators = get_success_indicators($row["id"]);
            $success_indicators_count = count($success_indicators);
            $rowspan = $success_indicators_count > 1 ? $success_indicators_count : 0;


            $datum = [
                "id" => $row["id"],
                "level" => $level,
                "index" => $row["index"],
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

                    $success_indicator_datum = [
                        "success_indicator" => $success_indicator["success_indicator"],
                        "performance_measures" => $performance_measures,
                        "quality" => $quality,
                        "efficiency" => $efficiency,
                        "timeliness" => $timeliness,
                        "in_charges" => get_incharges($success_indicator["in_charges"])
                    ];
                    $rows[] = array_merge($datum, $success_indicator_datum);
                }
            }
        }

        $parents = [];
        $parents = PmsRatingScaleMatrix::where("period_id", $period_id)->where('sys_department_id', $sys_department_id)->orderBy('index')->get()->toArray();


        foreach ($parents as $key => $parent) {
            $parents[$key]["label"] = $parent["code"] . ")  " . $parent["title"];
        }

        // array_unshift($parents, ["id" => "", "label" => "No Parent"]);

        return Inertia::render('Pms/RatingScaleMatrix/RatingScaleMatrix', ['period_id' => $period_id, 'rows' => $rows, 'parents' => $parents]);
    }

    public function create($period_id, Request $request)
    {
        $sys_department_id = auth()->user()->sys_department_id;
        if (!$sys_department_id) return "error: no assigned department!";

        # if parent_id is indicated get the index of parent and insert new after the parent
        $index = 0;
        $parent_id = null;
        if ($request->parent_id) {
            $parent_id = $request->parent_id;
        }
        # else if no parent_id indicated get first the last index
        else {
            $rsm = PmsRatingScaleMatrix::where("period_id", $period_id)->where("sys_department_id", $sys_department_id)->orderByDesc("index")->get(['index'])->first();
            $index = $rsm ? ($rsm->index + 1) : 0;
        }
        // return $index;
        // $mfo = PmsRatingScaleMatrix::where("period_id", $period_id)->where("sys_department_id");

        $mfo = new PmsRatingScaleMatrix;
        $mfo->period_id = $period_id;
        $mfo->parent_id = $parent_id;
        $mfo->sys_department_id = $sys_department_id;
        $mfo->index = $index;
        $mfo->code = $request->code;
        $mfo->title = $request->title;
        $mfo->save();

        return Redirect::back();
    }
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

# get in-charge employees
function get_incharges($sys_employee_ids)
{
    $data = [];
    if (!$sys_employee_ids) return $data;

    foreach ($sys_employee_ids as $key => $sys_employee_id) {
        $sys_employee = SysEmployee::find($sys_employee_id);
        // $datum = 
        $data[] = [
            "id" => $sys_employee->id,
            "full_name" => $sys_employee->full_name,
        ];
    }

    return $data;
}
