<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dish_tbl extends Model
{
  protected $table = 'dish_tbl';
  protected $primaryKey = 'dishID';
  protected $fillable = array('dishName', 'dishDescription', 'dishCost', 'dishImage', 'dishAvailability', 'dishStatus','dishTypeID');
  public $timestamps = false;
}
