<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = [
    	'name'
    ];

    public function menus(){
    	return $this->hasMany('App\Menu');
    }

    public function restaurants(){
    	return $this->belongsToMany('App/Restaurant', 'restaurantcategories', 'restaurant_id', 'category_id') ->withTimestamps();
    }
}
