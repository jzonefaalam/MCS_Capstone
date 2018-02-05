<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location_tbl extends Model
{
    protected $table = 'location_tbl';
	protected $primaryKey = 'locationID';
	protected $fillable = array('locationName', 'locationContactPerson', 'locationAddress', 'locationContactNumber', 'locationDescription', 'locationAddress', 'locationAvailability', 'locationStatus', 'locationImage');
	public $timestamps = false;
}

