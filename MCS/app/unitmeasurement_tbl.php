<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unitmeasurement_tbl extends Model
{
    protected $table = 'unitmeasurement_tbl';
	protected $primaryKey = 'uomID';
	protected $fillable = array('uomName', 'uomStatus');
	public $timestamps = false;
}
