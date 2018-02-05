<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventtype_tbl extends Model
{
    protected $table = 'eventtype_tbl';
	protected $primaryKey = 'eventTypeID';
	protected $fillable = array('eventTypeName', 'eventTypeDescription', 'eventTypeAvailability', 'eventTypeStatus', );
	public $timestamps = false;
}
