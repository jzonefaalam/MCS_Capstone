<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaseorder_tbl extends Model
{
  protected $table = 'purchaseorder_tbl';
  protected $primaryKey = 'poID';
  protected $fillable = array('poItemName','poDescription', 'poDate', 'poQty', 'poPrice', 'poTypeId', 'poStatus', 'uomID');
  public $timestamps = false;
}
