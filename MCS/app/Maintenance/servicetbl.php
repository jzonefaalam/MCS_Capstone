<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetbl extends Model
{
    protected $table = 'servicetbl';
	protected $primaryKey = 'serviceID';
	protected $fillable = array('serviceName', 'serviceDescription', 'serviceFee', 'serviceStatus', 'serviceAvailability');
}
