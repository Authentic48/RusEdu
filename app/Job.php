<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded =[];

    public function user()
    {
        $this->belongsToMany('App\User');
    }

     public function application()
     {
     $this->hasMany('App\Application');
     }

     public function getRouteKeyName()
     {
      return 'slug';
     }

}
