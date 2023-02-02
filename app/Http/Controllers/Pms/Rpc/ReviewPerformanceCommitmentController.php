<?php

namespace App\Http\Controllers\Pms\Rpc;

use App\Http\Controllers\Controller;
use App\Models\Pms\Pcr\PmsPcrStatus;
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

        $items = [];
        # test 
        $items = auth()->user();
        // PmsPcrStatus::where('')


        return Inertia("Pms/Rpc/Index", ["periods" => $periods, "items" => $items]);
    }

    public function show($period_id)
    {
        $period = PmsPeriod::find($period_id);
        return Inertia("Pms/Rpc/ReviewPerformanceCommitmentAndReview", ["period" => $period]);
    }
}
