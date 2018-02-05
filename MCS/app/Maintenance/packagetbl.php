<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packagetbl extends Model
{
    protected $table = 'packagetbl';
	protected $primaryKey = 'packageID';
	protected $fillable = array('packageName', 'packageDescription', 'packageCost', 'packageInclusion', 'packageStatus', 'packageAvailability', 'packageImage');
}

