<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
        protected $fillable	= [
    	'name', 'logo', 'phone', 'address', 'deliver_time', 'township_id', 'cuisine_id', 'category_id'
    ];

    public function categories(){
    	return $this->belongsToMany('App\Category', 'restaurantcategories', 'restaurant_id', 'category_id') ->withTimestamps();
    }

    public function cuisine(){
    	return $this->belongsTo('App\Cuisines');
    }

    public function township(){
    	return $this->belongsTo('App\Township');
    }
}
