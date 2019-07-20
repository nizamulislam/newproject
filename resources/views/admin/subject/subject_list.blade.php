@extends('layouts.app')

@section('content')
    <style>

    </style>
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
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                Subject List
                                @if(Session::get('message'))
                                    <h3><span class="btn btn-success">{{Session::get('message')}}</span></h3>
                                @endif
                            </div>

                            <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered">
                                       <tr>
                                           <th>#</th>
                                           <th>Name</th>
                                           <th>Action</th>
                                       </tr>
                                       @php($i=1)
                                       @foreach($mysubjects as $mysubject)
                                           <tr style="">
                                               <td width="">{{$i++}}</td>
                                               <td width="">{{$mysubject->subject_name}}</td>
                                               <td width="">

                                                      <a style="width:60px;"  href="{{route('mysubject.edit',$mysubject->id)}}" class="btn btn-primary btn-sm">Edit</a>



                                                   <form class="mt-2" action="{{ route('mysubject.destroy' , $mysubject->id)}}" method="POST" class="form-inline">
                                                       <input name="_method" type="hidden" value="DELETE">
                                                       {{ csrf_field() }}


                                                       <input style="width:60px;" type="submit" class="btn btn-danger btn-sm" value="Delete">

                                                   </form>



                                               </td>

                                           </tr>
                                           @endforeach
                                   </table>
                               </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
