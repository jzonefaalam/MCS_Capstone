<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetbl extends Model
{
    protected $table = 'coursetbl';
	protected $primaryKey = 'dishID';
	protected $fillable = array('dishName', 'dishDescription','dishCost','dishTypeID','dishAvailability','dishStatus','imageName');
}
