<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmentadditional_tbl extends Model
{
  protected $table = 'equipmentadditional_tbl';
  protected $primaryKey = 'equipmentAdditionalID';
  protected $fillable = array('equipmentAdditionalID', 'equipmentAdditionalQty', 'equipmentAdditionalNotes', 'equipmentAdditionalDesc', 'equipmentID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
