<?php

namespace App\Models\Pms\Pcr;

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
    
    protected $appends = ['signatories_inputs'];

    /**
     * Get the employees's full name.
     *
     * @return string
     */

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
