<?php

namespace App\Http\Controllers\Pms\Pcr;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupportFunctionController extends Controller
{
    public function show($period_id)
    {
        $period = PmsPeriod::find($period_id);
        return Inertia::render("Pms/Pcr/SupportFunctions", ["period" => $period]);
    }
}
