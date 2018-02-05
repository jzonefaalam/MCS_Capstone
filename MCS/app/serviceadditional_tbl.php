<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceadditional_tbl extends Model
{
  protected $table = 'serviceadditional_tbl';
  protected $primaryKey = 'serviceAdditionalID';
  protected $fillable = array('serviceAdditionalID', 'serviceAdditionalQty', 'serviceAdditionalNotes', 'serviceAdditionalDesc', 'serviceID', 'reservationID');
  public $timestamps = false;
  public $incrementing = false;
}
