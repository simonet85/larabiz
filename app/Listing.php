<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone','website','email','bio'
    ];
    
    //One to One relationship
    public function user(){
        return $this->belongsTo('App\User');
    }
}
