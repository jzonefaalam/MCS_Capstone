<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipment_tbl extends Model
{
    protected $table = 'equipment_tbl';
	protected $primaryKey = 'equipmentID';
	protected $fillable = array('equipmentName', 'equipmentDescription', 'equipmentRatePerHour', 'equipmentStatus', 'equipmentAvailability', 'equipmentImage', 'equipmentTypeID');
	public $timestamps = false;
}
