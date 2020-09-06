<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Menu;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class OrderlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index(){

    	$orders=Order::all();
    	return view('backend.orderlist.orderlist',compact('orders'));
    }

    public function orderdetail($id){

    	$order=Order::find($id);

    	$orderdetails=DB::table('orderdetails')
            ->join('menus', 'menus.id', '=', 'orderdetails.menu_id')
 			->where('orderdetails.order_id','=',$id)
            ->select('orderdetails.*', 'menus.name as menu_name','menus.price as menu_price')
            ->get();
    	// dd($order);
    	return view('backend.orderlist.orderdetail',compact("orderdetails",'order'));
    }

    public function dashboard(){

        $orders= Order::whereDate('created_at', Carbon::today())->get();
        // dd($orders);
        return view('backend.dashboard',compact('orders'));
    }

    public function maindashboard(){
        // $ordercount = Order::all()->count();
        $ordercount = Order::whereDate('created_at', Carbon::today())->get()->count();
        $rescount = Restaurant::all()->count();
        $menucount = Menu::all()->count();
        $usercount = User::all()->count();
        // dd($ordercount);
        return view('backend.maindashboard', compact('ordercount', 'rescount', 'menucount', 'usercount'));
    }


    public function ordercheck(Request $request){
        $sdate = $request->sdate;
        $edate = $request->edate;
        // dd($sdate, $edate);
        $ordercheckdate = Order::whereBetween('created_at', [$sdate, $edate])->get();
        // dd($ordercheckdate);
        return $ordercheckdate;
    }

}


