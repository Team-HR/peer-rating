<?php

namespace App\Models\Pms\Pcr;

use App\Models\SysDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\SysEmployee;

class PmsPcrStatus extends Model
{
    use HasFactory;

    protected $casts = [
        'is_submitted' => 'boolean',
    ];

    protected $appends = [
        'full_name',
        'signatories_inputs',
        'sys_department'
    ];

    public function getSysDepartmentAttribute()
    {
        $department = SysDepartment::find($this->sys_department_id);
        return $department->name;
    }


    /**
     * Get the employees's full name.
     *
     * @return string
     */

    public function getFullNameAttribute()
    {
        $full_name = SysEmployee::find($this->sys_employee_id);
        return $full_name->full_name;
    }

    public function getSignatoriesInputsAttribute()
    {

        $immediate_supervisor = NULL;

        if (isset($this->immediate_supervisor)) {
            $immediate_supervisor = $this->agency == "lgu" ? SysEmployee::find($this->immediate_supervisor) : $this->immediate_supervisor;
        }

        $department_head = NULL;
        if (isset($this->department_head)) {
            $department_head = $this->agency == "lgu" ? SysEmployee::find($this->department_head) : $this->department_head;
        }

        $array = [
            "immediate_supervisor" => $immediate_supervisor,
            "department_head" => $department_head,
            "head_of_agency" => $this->head_of_agency
        ];


        return $array;
    }
}
