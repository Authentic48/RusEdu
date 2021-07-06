<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StudentPost extends Model
{
    
    protected $guarded = [];
    
    
    public function user(){

    return $this->belongsToMany('App\User');

    }

    public function getRouteKeyName()
    {
     return 'slug';
    }
    
    

    /**
    * The has Many Relationship
    *
    * @var array
    */
    public function comments()
    {
    return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

   

   
}
