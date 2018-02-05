<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmenttbl extends Model
{
    protected $table = 'equipmenttbl';
	protected $primaryKey = 'equipmentID';
	protected $fillable = array('equipmentName', 'equipmentDescription', 'equipmentRatePerHour', 'equipmentUnit', 'equipmentStatus', 'equipmentAvailability', 'equipmentImage');
}
