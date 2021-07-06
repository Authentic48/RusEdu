<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     protected $guarded =[];

     public function job()
     {
     $this->belongsTo('App\Job');
     }
}
