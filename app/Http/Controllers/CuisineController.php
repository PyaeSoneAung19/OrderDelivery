<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuisines;
use Auth;

class CuisineController extends Controller
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
        $cuisines = Cuisines::all();
        return view('backend.cuisine.list', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cuisine.new');
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
            'name'=>['required','string','max:255','unique:cuisines']
                            ]);
        if($validator){

            $name = $request->name;
            $cuisine = new Cuisines;
            $cuisine->name = $name;
            $cuisine->save();
            return redirect()->route('cuisine.index')
                            ->with("successMsg",'New Cuisine is added to your data');

         }
         else{

            return redirect::back()->withErrors($validator);

         }
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
        $cuisine = Cuisines::find($id);
        return view('backend.cuisine.edit', compact('cuisine'));
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
        $cuisine = Cuisines::find($id);
        $cuisine->name = $name;
        $cuisine->save();
        return redirect()->route('cuisine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuisine = Cuisines::find($id);
        $cuisine->delete();
        return redirect()->route('cuisine.index');
    }
}
