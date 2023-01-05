<?php

namespace App\Models\PeerRating;

use App\Models\SysEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerRatingSectionHead extends Model
{
    use HasFactory;

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {

        $employee = SysEmployee::find($this->employee_id);
        $last_name = $employee->last_name;
        $first_name = $employee->first_name;
        $middle_name = $employee->middle_name && strlen($employee->middle_name) > 0 ? " " . $employee->middle_name[0] . "." : "";
        $ext = $employee->ext && strlen($employee->ext) > 0 ? " " . $employee->ext : "";


        return "{$last_name}, {$first_name}{$middle_name}{$ext}";
    }
}
