<?php

namespace App\Http\Controllers\Pms;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    public function index()
    {
        return Inertia::render('Pms/Settings/Index');
    }

    public function periods()
    {
        $periods = PmsPeriod::all();
        $years = [];
        foreach ($periods as $period) {
            if (!in_array($period["year"], $years)) {
                $years[] = $period["year"];
            }
        }

        $_years = [];

        foreach ($years as $year) {
            $_years[] = [
                "year" => $year,
                "firstPeriod" => "January - June",
                "secondPeriod" => "July - December"
            ];
        }

        rsort($_years);

        return Inertia::render('Pms/Settings/Periods', ['years' => $_years]);
    }


    public function support_functions()
    {
        return Inertia::render('Pms/Settings/SupportFuncitons');
    }

    public function create_period(Request $request)
    {
        $year = $request->year;

        // check first if year  already exist
        $res = PmsPeriod::where("year", $year)->get();
        $exists = count($res);
        if ($exists < 1) {
            // return "create";
            // PmsPeriod::create([
            //     "period" => "January - June",
            //     "year" => $year,
            // ]);

            $pmsPeriod = new PmsPeriod;
            $pmsPeriod->period = "January - June";
            $pmsPeriod->year = $year;
            $pmsPeriod->save();


            $pmsPeriod = new PmsPeriod;
            $pmsPeriod->period = "July - December";
            $pmsPeriod->year = $year;
            $pmsPeriod->save();

            // PmsPeriod::create([
            //     "period" => "July - December",
            //     "year" => $year,
            // ]);
            return Redirect::back();
        }
        // return "exists";
        return Redirect::back();
    }

    public function support_functions_setup($period_id)
    {

        $period = PmsPeriod::find($period_id);
        return Inertia::render("Pms/Settings/SupportFuncitonsPeriod", ["period" => $period]);
    }

    public function support_functions_setup_create($period_id, Request $request)
    {
        return [$period_id, $request->all()];
    }
}
