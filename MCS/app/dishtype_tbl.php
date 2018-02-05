<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dishtype_tbl extends Model
{
  protected $table = 'dishtype_tbl';
  protected $primaryKey = 'dishTypeID';
  protected $fillable = array('dishTypeName', 'dishTypeDescription', 'dishTypeImage', 'dishTypeStatus');
  public $timestamps = false;
}
