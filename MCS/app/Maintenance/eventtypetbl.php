<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventtypetbl extends Model
{
    protected $table = 'eventTypetbl';
	protected $primaryKey = 'eventTypeID';
	protected $fillable = array('eventTypeName', 'eventTypeDescription', 'eventTypeAvailability', 'eventTypeStatus', );
}
