<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetypetbl extends Model
{
    protected $table = 'coursetypetbl';
	protected $primaryKey = 'dishTypeID';
	protected $fillable = array('dishTypeName', 'dishTypeDescription', 'dishTypeStatus','dishTypeImage');
}
