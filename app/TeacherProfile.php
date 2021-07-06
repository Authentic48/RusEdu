<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class TeacherProfile extends Model
{
    
    protected $guarded =[];

    public function user()
    {
     return $this->belongsTo('App\User');
    }

    public function reviews()
    {
     return $this->hasMany('App\SchoolReview');  
    }

    public function getRouteKeyName()
    {
     return 'slug';
    }
}
