<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_tbl extends Model
{
  protected $table = 'event_tbl';
  protected $primaryKey = 'eventID';
  protected $fillable = array('eventID','eventName', 'eventDate', 'eventTime','endTime','eventLocation', 'guestCount', 'eventStatus', 'customerID', 'eventTypeID');
  public $timestamps = false;
  public $incrementing = false;
}
