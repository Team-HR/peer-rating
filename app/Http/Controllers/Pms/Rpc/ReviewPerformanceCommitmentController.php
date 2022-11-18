<?php

namespace App\Http\Controllers\Pms\Rpc;

use App\Http\Controllers\Controller;
use App\Models\PmsPeriod;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewPerformanceCommitmentController extends Controller
{
    public function index()
    {
        $periods = PmsPeriod::all();
        foreach ($periods as $key => $period) {
            $periods[$key]['text'] = $period['period'] . ", " . $period['year'];
        }
        return Inertia("Pms/Rpc/Index", ["periods" => $periods]);
    }

    public function show($period_id)
    {
        $period = PmsPeriod::find($period_id);
        return Inertia("Pms/Rpc/ReviewPerformanceCommitmentAndReview", ["period" => $period]);
    }
}
