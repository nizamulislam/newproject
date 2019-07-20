@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" style="width:90%;" type="button" id="classSection" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Class Management
                    </button>
                    <div class="dropdown-menu" aria-labelledby="classSection">
                        <a class="dropdown-item" href="{{route('myclass.create')}}">Add Class</a>
                        <a class="dropdown-item" href="{{route('myclass.index')}}">Class List</a>

                    </div>
                </div>

                <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" style="width:90%;"  type="button" id="subjectsection" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Subject Management
                    </button>
                    <div class="dropdown-menu" aria-labelledby="subjectsection">
                        <a class="dropdown-item" href="{{route('mysubject.create')}}">Add Subject</a>
                        <a class="dropdown-item" href="{{route('mysubject.index')}}">Subject List</a>
                    </div>
                </div>

                <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" style="width:90%;"  type="button" id="classwisesubject" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ClassWise Subject
                    </button>
                    <div class="dropdown-menu" aria-labelledby="classwisesubject">
                        <a class="dropdown-item" href="{{route('classwisesubject.create')}}">New Data</a>
                        <a class="dropdown-item" href="{{route('classwisesubject.index')}}">Data List</a>


                    </div>
                </div>

            </div>

            <div class="col-md-9">


               <div class="row">
                   <div class="col-md-4">
               <div class="card">
                   <div class="card-header">
                       Subject Generate Form
                       @if(Session::get('message'))
                           <h3><span class="btn btn-success">{{Session::get('message')}}</span></h3>
                       @endif
                   </div>

                   <div class="card-body">
                       <form action="@if(!empty($editmysubject)){{route('mysubject.update',$editmysubject->id)}} @else {{route('mysubject.store')}} @endif" method="post">
                           {{csrf_field()}}
                           @if(!empty($editmysubject))   @method('PUT') @endif

                           <div class="form-group">
                               <label>Subject Name</label>
                               <input type="text" name="subject_name" value="@if(!empty($editmysubject)){{$editmysubject->subject_name}}@endif" class="form-control">
                           </div>
                           <div class="form-group">
                               <label></label>
                               <input type="submit" name="btn" class="btn btn-info" value="@if(!empty($editmysubject)) Update @else Save @endif">
                           </div>
                       </form>

                   </div>
             </div>

            </div>
        </div>
      </div>
     </div>
    </div>
@endsection
