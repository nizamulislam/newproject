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
                                <form action="@if(!empty($editdata)){{route('classwisesubject.update',$editdata->id)}} @else {{route('classwisesubject.store')}} @endif" method="post">
                                    {{csrf_field()}}
                                    @if(!empty($editdata))   @method('PUT') @endif


                                    <div class="form-group">
                                        <label>Class Name</label>
                                       <select name="class_id" class="form-control" required>
                                           <option value="">Select Class</option>
                                           @if(!empty($editdata))

                                           @foreach($myclasses as $myclass)
                                               <option value="{{$myclass->id}}" {{$editdata->class_id==$myclass->id?'selected':''}}>{{$myclass->myclass_name}}</option>
                                           @endforeach

                                           @endif
                                       </select>

                                    </div>


                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <hr/>

                                        @if(!empty($editdata))
                                            <?php
                                            //$pc=DB::table('product_categories')->where('product_id','=',1)->get();

                                            $x=explode(",",$editdata->subject_id);

                                            ?>



                                            @foreach($subjects as $subject)

                                                @if(in_array($subject->id,$x))
                                                    <input type="checkbox" checked name="subject_id[]" value="{{$subject->id}}">
                                                    {{$subject->subject_name}}
                                                @else
                                                    <input type="checkbox"  name="subject_id[]" value="{{$subject->id}}"> {{$subject->subject_name}}
                                                @endif


                                            @endforeach


                                            <?php echo "<br/><br/>" ?>



                                        @else

                                            @foreach($subjects as $subject)
                                                <input type="checkbox" name="subject_id[]" value="{{$subject->id}}">{{$subject->subject_name}}
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <input type="submit" name="btn" class="btn btn-info" value="@if(!empty($editdata)) Update @else Save @endif">
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
