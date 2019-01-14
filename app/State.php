<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];
    function publications(){
        return $this->hasMany('App\Publications');
    }
}