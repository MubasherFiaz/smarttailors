<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   protected $fillable = ["shop_name","tailor_id", "description", "address", "latitude", "longitude", "image"];
}
