<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use App\Menu;
use Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('backend.menu.list', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('backend.menu.new', compact('restaurants', 'categories'));
    }

    public function getcategory(Request $request){
        $id = $request->id;
        // dd($id);
        $selectcategory = DB::table('restaurantcategories')
                        ->join('categories', 'categories.id', '=',
                        'restaurantcategories.category_id')
                        ->where('restaurantcategories.restaurant_id', '=', $id)
                        ->select('restaurantcategories.*', 'categories.name as cname')
                        ->get();
        // dd($selectcategory);
        return $selectcategory;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'name' =>['required','string','max:255','unique:menus'],
            'photo' => ['required|mimes:jpeg,bmp,png,jpg'],
            'price' => ['required','string','max:255'],
            'restaurant_id'=> 'required|numeric|min:0|not_in:0',
            'category_id'=> 'required|numeric|min:0|not_in:0',
        ]);

        if($validator){
        $codeno = mt_rand(1000,9999);
        $name = $request->name;

        $photo = $request->photo;

        $price = $request->price;
        $description = $request->description;
        $restaurant_id = $request->restaurant_id;
        $category_id = $request->category_id;

         if ($request->hasfile('images')) 
            {
                $i=1;
                foreach($request->file('images') as $image)
                {
                    $imagename = time().$i.'.'.$image->extension();
                    $image->move(public_path('images/menu'), $imagename);  
                    $data[] = 'images/menu/'.$imagename;
                    $i++;
                }
            }

        $menu = new Menu;
        $menu->codeno = $codeno;
        $menu->name = $name;
        $menu->photo = json_encode($data);

        $menu->price = $price;
        $menu->description = $description;
        $menu->restaurant_id = $restaurant_id;
        $menu->category_id = $category_id;
        $menu->save();

        return redirect()->route('menu.index')
                        ->with("successMsg",'New Menu is added to your data');

         }
         else{
            return redirect::back()->withErrors($validator);
         }

        // dd($name, $photo, $price, $description, $restaurant_id, $category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('backend.menu.edit', compact('menu', 'restaurants', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $codeno=$request->codeno;
        
        $price = $request->price;
        $description = $request->description;
        $restaurant_id = $request->restaurant_id;
        $category_id = $request->category_id;


         if ($request->hasfile('images')) 
            {

                $i = 1;
                foreach($request->file('images') as $file)
                {
                    $name = time().$i.'.'.$file->extension();
                    $file->move(public_path('images/menu'), $name);  
                    $data[] = 'images/menu/'.$name;
                    $i++;
                }

                foreach (json_decode($request->oldPhoto) as $oldphoto){
                    if(\File::exists(public_path($oldphoto))){
                        \File::delete(public_path($oldphoto));
                    }
                }
            }else{
                $data = json_decode($request->oldPhoto);
            }

        $menu=Menu::find($id);
        $menu->codeno = $codeno;
        $menu->name = $name;
        $menu->photo = json_encode($data);
        $menu->price = $price;
        $menu->description = $description;
        $menu->restaurant_id = $restaurant_id;
        $menu->category_id = $category_id;
        $menu->save();

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

         foreach (json_decode($menu->photo) as $oldphoto){
            if(\File::exists(public_path($oldphoto))){
                \File::delete(public_path($oldphoto));
            }
        }

        $menu->delete();
        return redirect()->route('menu.index');
    }
}
