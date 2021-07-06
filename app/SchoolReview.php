<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolReview extends Model
{
   protected $guarded = [];

   public function student(){

    return $this->belongsTo('App\User');

   }
}
