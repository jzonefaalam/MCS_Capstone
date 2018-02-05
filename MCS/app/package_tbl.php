<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_tbl extends Model
{
    protected $table = 'package_tbl';
	protected $primaryKey = 'packageID';
	protected $fillable = array('packageName', 'packageDescription', 'packageCost', 'packageStatus', 'packageAvailability', 'packageImage');
	public $timestamps = false;
}

