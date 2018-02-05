<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packageinclusion_tbl extends Model
{
    protected $table = 'packageinclusion_tbl';
	protected $primaryKey = 'packageInclusionID';
	protected $fillable = array('packageID', 'dishTypeID', 'equipmentID', 'packageInlusionStatus');
	public $timestamps = false;
}

