<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'category','title','description'
    ];
    function state(){
        return $this->belongsTo('App\State');
    }

    function user(){
        return $this->hasMany('App\User');
    }
    
}

