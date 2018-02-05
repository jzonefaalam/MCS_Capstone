<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetype_tbl extends Model
{
    protected $table = 'servicetype_tbl';
	protected $primaryKey = 'serviceTypeID';
	protected $fillable = array('serviceTypeName', 'serviceTypeStatus', 'serviceTypeAvailability');
	public $timestamps = false;
}
