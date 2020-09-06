<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
   use SoftDeletes;
    protected $fillable=[
    	'orderdate','voucherno','address','status',' total','deli_charges','user_id'
    	];


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function menus(){
    	return $this->belongsToMany('App\Menu','orderdetails',
                                	'order_id','menu_id')
    				->withPivot('qty', 'price', 'subtotal')
    				->withTimestamps();
    }
}
