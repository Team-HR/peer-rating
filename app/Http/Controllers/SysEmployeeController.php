<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SysEmployee;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SysEmployeeController extends Controller
{
    public function index()
    {
        $employees = SysEmployee::where('is_employee', 1)->orderBy('last_name')->get();
        return Inertia::render('Employees', ['employees' => $employees]);
    }

    public function create(Request $request)
    {
        # check first if personnel is already in the list
        $is_exists  = SysEmployee::where('last_name', $request->last_name)
            ->where('first_name', $request->first_name)
            ->where('middle_name', $request->middle_name)
            ->where('ext', $request->ext)
            ->count();

        if ($is_exists > 0) {
            return "Personnel already existing, please add using the dropdown menu.";
        }

        $employee = new SysEmployee;
        $employee->last_name = mb_convert_case($request->last_name, MB_CASE_UPPER);
        $employee->first_name =  mb_convert_case($request->first_name, MB_CASE_UPPER);
        $employee->middle_name = $request->middle_name ? mb_convert_case($request->middle_name, MB_CASE_UPPER) : null;
        $employee->ext = $request->ext ? mb_convert_case($request->ext, MB_CASE_UPPER) : null;
        $employee->is_employee = 1;
        $employee->save();
        return Redirect::back(303);
    }
}
