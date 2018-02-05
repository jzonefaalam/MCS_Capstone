<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_tbl extends Model
{
  protected $table = 'contact_tbl';
  protected $primaryKey = 'contactID';
  protected $fillable = array('contactID','contactName', 'contactNum', 'customerID');
  public $timestamps = false;
  public $incrementing = false;
}
