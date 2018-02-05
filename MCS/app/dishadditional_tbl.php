<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dishadditional_tbl extends Model
{
  protected $table = 'dishadditional_tbl';
  protected $primaryKey = 'additionalID';
  protected $fillable = array('additionalID', 'additionalServing', 'additionalNotes', 'dishID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
