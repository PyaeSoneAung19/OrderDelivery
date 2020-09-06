<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Menu;
use App\Township;
use Carbon\Carbon;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        // return view('auth/login');
    	$restaurants = Restaurant::all();
    	return view('frontend.index', compact('restaurants'));
    }

    public function resdetail($id)
    {
    	$restaurant = Restaurant::where('id',$id)->first();
       // dd($restaurant);
    	$menus = Menu::where('restaurant_id', $id )->get();
    	return view('frontend.restdetail', compact('menus', 'restaurant'));
    }

    public function detail($id)
    {
    	$menu = Menu::find($id);
    	return view('frontend.itemdetail', compact('menu'));
    }

    public function search(Request $request){
        $keyword = $request->id;
        $rid = $request->rid;
        //dd($keyword);

        $data = Menu::where('category_id', $keyword)
        ->where('restaurant_id', $rid)->get();

       // / dd($data);
        return $data;
    }

    public function searchTownship($id){
        $restaurants = Restaurant::where('township_id', $id)->get();
        return view('frontend.township', compact('restaurants'));
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function orderhistory($id){
        $users = Order::where('user_id', $id)->get();
        return view('frontend.orderhistory', compact('users'));
    }

    public function order(Request $request){

        $carts=json_decode($request->data);


        $address=$request->address;
        $townshipid=$request->townshipid;
        $orderdate=Carbon::now();
        $voucherno=uniqid();
        $status='order';

        $total=0;
        foreach($carts as $value){
            $total+=$value->price*$value->qty;
        }

        // dd($total);
        $auth=Auth::user();
        $userid=$auth->id;

        $townshipid=Township::find($townshipid);
        $deli_charges=$townshipid->charges;
        //dd($deli_charges);

        $order=new Order();
        $order->orderdate=$orderdate;
        $order->voucherno=$voucherno;
        $order->address=$address;
        $order->status=$status;
        $order->total=$total;
        $order->user_id=$userid;
        $order->deli_charges=$deli_charges;
        $order->save();

        foreach($carts as $value){
            $menuid=$value->id;
            $qty=$value->qty;
            $price=$value->price;
            $subtotal=$qty*$price;
            

        $order->menus()->attach($menuid,['qty'=>$qty, 'price'=>$price, 'subtotal'=>$subtotal]);
        }

         return response()->json([
            'status'=>'order successfully created!'
        ]);
    }

    public function detailhistory(Request $request){
        $id = $request->id;
        // dd($id);
        // $order=Order::find($id);

        $orderdetails=DB::table('orderdetails')
            ->join('menus', 'menus.id', '=', 'orderdetails.menu_id')
            ->where('orderdetails.order_id','=',$id)
            ->select('orderdetails.*', 'menus.name as menu_name','menus.price as menu_price')
            ->get();

        // dd($orderdetails);

        return $orderdetails;
        // dd($order);
        // return view('backend.orderlist.orderdetail',compact("orderdetails",'order'));
    }

    public function searchItem(Request $request){
        $keyword = $request->sItem;
        //dd($keyword);
        $searchitem = DB::table('restaurants')
            ->join('menus', 'restaurants.id', '=', 'menus.restaurant_id')
            ->select('restaurants.*','menus.name as menuname')
            ->where('menus.name', $keyword)
            ->get();
        // dd($searchitem);
        return $searchitem;
    }
}
