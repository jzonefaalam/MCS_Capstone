<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeemployed_tbl extends Model
{
  protected $table = 'employeeemployed_tbl';
  protected $primaryKey = 'employeeEmployedID';
  protected $fillable = array('employeeEmployedID', 'employeeTypeID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
