<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeadditional_tbl extends Model
{
  protected $table = 'employeeadditional_tbl';
  protected $primaryKey = 'employeeAdditionalID';
  protected $fillable = array('employeeAdditionalID','employeeAdditionalQty', 'employeeAdditionalNotes', 'employeeTypeID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
