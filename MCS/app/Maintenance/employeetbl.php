<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeetbl extends Model
{
    protected $table = 'employeetbl';
	protected $primaryKey = 'employeeID';
	protected $fillable = array('employeeName', 'employeeTypeID', 'employeeAvailability', 'employeeStatus','employeeImage');
}
