<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;
use Auth;

class TownshipController extends Controller
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
        $townships = Township::all();
        return view('backend.township.list', compact('townships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.township.new');
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

             'name' => ['required','string','max:255','unique:townships'],
              'charges' => ['required','string','max:255']
                                    ]);
        if($validator){

            $name = $request->name;
            $charges = $request->charges;

            $township = new Township;
            $township->name = $name;
            $township->charges = $charges;
            $township->save();

             return redirect()->route('township.index')
                            ->with("successMsg",'New township is Added to your data');;

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
        $township = Township::find($id);
        return view('backend.township.edit', compact('township'));
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
        $charges = $request->charges;

        $township = Township::find($id);
        $township->name = $name;
        $township->charges = $charges;
        $township->save();
        return redirect()->route('township.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $township = Township::find($id);
        $township->delete();
        return redirect()->route('township.index');
    }
}
