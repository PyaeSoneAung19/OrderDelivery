<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuisines extends Model
{
    use SoftDeletes;
    protected $fillable	= [
    	'name'
    ];

    public function restaurants(){
    	return $this->hasMany('App\Restaurant');
    }
}
