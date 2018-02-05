<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locationtbl extends Model
{
    protected $table = 'locationtbl';
	protected $primaryKey = 'locationID';
	protected $fillable = array('locationName', 'locationContactPerson', 'locationContactNumber', 'locationDescription', 'locationFee', 'locationAddress', 'locationAvailability', 'locationStatus', 'locationImage');
}

