<?php

namespace App\Http\Controllers;

use App\ClasswiseSubject;
use App\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function searchSubject($id){
        $subjects=Subject::all();
        $classwisesubject=ClasswiseSubject::where('class_id',$id)->first();
      if($classwisesubject!=""){
          $x=explode(",",$classwisesubject->subject_id);


          foreach($subjects as $subject){
              if(in_array($subject->id,$x)){
                  echo $subject->subject_name.",";
              }

          }
      }
        else{
            echo "No subject here";
        }
    }
}
