<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_tbl extends Model
{
  protected $table = 'customer_tbl';
  protected $primaryKey = 'customerID';
  protected $fillable = array('customerID','fullName', 'dateOfBirth', 'homeAddress','billingAddress', 'emailAddress', 'telNum', 'cellNum', 'customerStatus', 'customerAvailabilty');
  public $timestamps = false;
  public $incrementing = false;
}
