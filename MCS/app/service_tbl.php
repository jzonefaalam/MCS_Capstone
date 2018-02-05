<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_tbl extends Model
{
    protected $table = 'service_tbl';
	protected $primaryKey = 'serviceID';
	protected $fillable = array('serviceName', 'serviceDescription', 'serviceFee', 'serviceTypeID', 'serviceStatus', 'serviceAvailability', 'serviceImage');
	public $timestamps = false;
}
