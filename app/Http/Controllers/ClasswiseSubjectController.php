<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myclass;
use App\Subject;
use App\ClasswiseSubject;
use Session;

class ClasswiseSubjectController extends Controller
{

    public function index()
    {
        $myclasses=Myclass::all();
        return view('admin.subject.subject_list',compact('mysubjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myclasses=Myclass::all();
        $mysubjects=Subject::all();
        return view('admin.classwisesubject.add_file',compact('myclasses','mysubjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mysubject=new Subject();
        $mysubject->subject_name=$request->subject_name;
        $mysubject->save();
        return redirect()->route('classwisesubject.index')->with('message','Successfully Data Saved');
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
        $editmysubject=Subject::find($id);
        return view('admin.classwisesubject.add_file',compact('editmysubject'));
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
        $mysubject=Subject::find($id);
        $mysubject->subject_name=$request->subject_name;
        $mysubject->save();
        return redirect()->route('classwisesubject.index')->with('message','Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mysubject=Subject::find($id);
        $mysubject->delete();
        return back()->with('message','Successfully Data Delete');

    }
}
