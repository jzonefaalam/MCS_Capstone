<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation_tbl extends Model
{
  protected $table = 'reservation_tbl';
  protected $primaryKey = 'reservationID';
  protected $fillable = array('reservationID','reservationStatus', 'eventID', 'paymentModeID','paymentTermID', 'packageID');

}
