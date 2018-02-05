<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceavailed_tbl extends Model
{
  protected $table = 'serviceavailed_tbl';
  protected $primaryKey = 'serviceAvailedID';
  protected $fillable = array('serviceAvailedID', 'serviceID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
