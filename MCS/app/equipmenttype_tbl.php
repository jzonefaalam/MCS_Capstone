<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmenttype_tbl extends Model
{
    protected $table = 'equipmenttype_tbl';
	protected $primaryKey = 'equipmentTypeID';
	protected $fillable = array('equipmentTypeName', 'equipmentTypeStatus');
	public $timestamps = false;
}
