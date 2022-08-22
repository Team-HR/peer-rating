<?php

namespace App\Http\Controllers\Pms\Pcr;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
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
        return Inertia::render("Pms/Pcr/Status", ["period" => $period]);
    }

    public function show_form_type($period_id)
    {
        $period = PmsPeriod::find($period_id);
        return Inertia::render("Pms/Pcr/FormType", ["period" => $period]);
    }
}
