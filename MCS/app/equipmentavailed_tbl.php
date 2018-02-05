<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmentavailed_tbl extends Model
{
  protected $table = 'equipmentavailed_tbl';
  protected $primaryKey = 'equipmentAvailedID';
  protected $fillable = array('equipmentAvailedID', 'equipmentID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
