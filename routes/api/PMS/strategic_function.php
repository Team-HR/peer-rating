<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pms\Pcr\CoreFunctionController;
use App\Http\Controllers\Pms\Pcr\SupportFunctionController;
use App\Models\Pms\Pcr\PmsPcrStrategicFunctionData;

Route::post('/pms/strategic_function', function (Request $request) {

    $pms_period_id = $request->pms_pcr_status['pms_period_id'];
    $sys_employee_id = $request->pms_pcr_status['sys_employee_id'];

    $rows = PmsPcrStrategicFunctionData::where("pms_period_id", $pms_period_id)->where("sys_employee_id", $sys_employee_id)->get();
    $data = $rows;

    return $data;
});

Route::post('/pms/strategic_function/create_or_update', function (Request $request) {
    // return $request->all();

    // return $request->accomplishment;
    $accomplishment = $request->accomplishment;

    if (!$accomplishment['id']) {
        # create
        $PmsPcrStrategicFunctionData = new PmsPcrStrategicFunctionData;
        $PmsPcrStrategicFunctionData->pms_period_id = $accomplishment['pms_period_id'];
        $PmsPcrStrategicFunctionData->sys_employee_id = $accomplishment['sys_employee_id'];
        $PmsPcrStrategicFunctionData->function_title = $accomplishment['function_title'];
        $PmsPcrStrategicFunctionData->success_indicator = $accomplishment['success_indicator'];
        $PmsPcrStrategicFunctionData->actual_accomplishment = $accomplishment['actual_accomplishment'];
        $PmsPcrStrategicFunctionData->final_numerical_rating = $accomplishment['final_numerical_rating'];
        $PmsPcrStrategicFunctionData->percent = $accomplishment['percent'];
        $PmsPcrStrategicFunctionData->not_applicable = $accomplishment['not_applicable'];
        $PmsPcrStrategicFunctionData->save();
    } else {
        # update
        $PmsPcrStrategicFunctionData = PmsPcrStrategicFunctionData::find($accomplishment['id']);
        $PmsPcrStrategicFunctionData->function_title = $accomplishment['function_title'];
        $PmsPcrStrategicFunctionData->success_indicator = $accomplishment['success_indicator'];
        $PmsPcrStrategicFunctionData->actual_accomplishment = $accomplishment['actual_accomplishment'];
        $PmsPcrStrategicFunctionData->final_numerical_rating = $accomplishment['final_numerical_rating'];
        $PmsPcrStrategicFunctionData->save();
    }
});




Route::post('/pms/strategic_function/delete', function (Request $request) {
    $pms_pcr_status = $request->pms_pcr_status;
    return PmsPcrStrategicFunctionData::where('pms_period_id', $pms_pcr_status['pms_period_id'])->where('sys_employee_id', $pms_pcr_status['sys_employee_id'])->delete();
});
