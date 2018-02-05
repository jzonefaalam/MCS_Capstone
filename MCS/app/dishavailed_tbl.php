<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dishavailed_tbl extends Model
{
  protected $table = 'dishavailed_tbl';
  protected $primaryKey = 'dishAvailedID';
  protected $fillable = array('dishAvailedID', 'dishID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
