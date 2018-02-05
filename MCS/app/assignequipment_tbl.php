<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignequipment_tbl extends Model
{
    protected $table = 'assignequipment_tbl';
	protected $primaryKey = 'assignEquipmentID';
	protected $fillable = array('assignEquipmentQty', 'assignReturnQty', 'assignEquipmentDate','assignEquipmentStatus','equipmentID','reservationID');
	public $timestamps = false;
}
