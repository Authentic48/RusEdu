<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded =[];

    public function school()
    {
     $this->belongsTo('App\SchoolProfile');
    }
}
