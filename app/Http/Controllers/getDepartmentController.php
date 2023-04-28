<?php

namespace App\Http\Controllers;

use App\Models\SysDepartment;
use Illuminate\Http\Request;

class getDepartmentController extends Controller
{
   public function test(){
    $departments = SysDepartment::all();
     return $departments;
   }  
   // public function delete ($id){
   //    $departments = SysDepartment::all();
   //     return $id;
   //   }

}
