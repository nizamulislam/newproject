<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myclass;
use App\Subject;
use App\ClasswiseSubject;
use Session;
use DB;

class ClasswiseSubjectController extends Controller
{

    public function index()
    {
        $myclasses=Myclass::all();
        $subjects=Subject::all();
        $classwisesubjects=DB::table('classwise_subjects')
                          ->leftJoin('myclasses','classwise_subjects.class_id','=','myclasses.id')
                          ->select('classwise_subjects.*','myclasses.myclass_name')
                         ->get();
        return view('admin.classwisesubject.index',compact('myclasses','subjects','classwisesubjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myclasses=Myclass::all();
        $subjects=Subject::all();
        return view('admin.classwisesubject.add_file',compact('myclasses','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x=$request->subject_id;
        $implodeData=implode(",",$x);

        $a=new ClasswiseSubject();
        $a->class_id=$request->class_id;
        $a->subject_id=$implodeData;
        $a->save();
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

        $myclasses=Myclass::all();
        $subjects=Subject::all();
        $editdata=ClasswiseSubject::find($id);
        return view('admin.classwisesubject.add_file',compact('editdata','subjects','myclasses'));
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
        $x=$request->subject_id;
        $implodeData=implode(",",$x);

        $a=ClasswiseSubject::find($id);
        $a->class_id=$request->class_id;
        $a->subject_id=$implodeData;
        $a->save();
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
        $a=ClasswiseSubject::find($id);
        $a->delete();
        return back()->with('message','Successfully Data Delete');

    }
}
