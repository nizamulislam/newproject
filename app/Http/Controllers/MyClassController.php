<?php

namespace App\Http\Controllers;

use App\Myclass;
use Illuminate\Http\Request;
use Session;


class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myclasses=Myclass::all();
        return view('admin.myclass.class_list',compact('myclasses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.myclass.add_class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myclass=new Myclass();
        $myclass->myclass_name=$request->myclass_name;
        $myclass->save();
        return redirect()->route('myclass.index')->with('message','Successfully Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editmyclass=Myclass::find($id);
        return view('admin.myclass.add_class',compact('editmyclass'));
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
        $myclass=Myclass::find($id);
        $myclass->myclass_name=$request->myclass_name;
        $myclass->save();
        return redirect()->route('myclass.index')->with('message','Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myclass=Myclass::find($id);
        $myclass->delete();
        return back()->with('message','Successfully Data Delete');

    }
}
