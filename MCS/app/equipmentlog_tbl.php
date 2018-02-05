<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmentlog_tbl extends Model
{
    protected $table = 'equipmentlog_tbl';
	protected $primaryKey = 'equipmentLogID';
	protected $fillable = array('equipmentID', 'equipmentQuantityIn', 'equipmentQuantityOut', 'equipmentLogDate');
	public $timestamps = false;
}
