<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'name', 'charges'
    ];

    public function restaurants(){
    	return $this->hasMany('App\Restaurant');
    }

}
