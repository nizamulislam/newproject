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
                    <a class="dropdown-item" href="#">Class List</a>

                </div>
            </div>

            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" style="width:90%;"  type="button" id="subjectsection" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Subject Management
                </button>
                <div class="dropdown-menu" aria-labelledby="subjectsection">
                    <a class="dropdown-item" href="#">Add Subject</a>
                    <a class="dropdown-item" href="#">Subject List</a>
                </div>
            </div>

            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" style="width:90%;"  type="button" id="classwisesubject" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   ClassWise Subject
                </button>
                <div class="dropdown-menu" aria-labelledby="classwisesubject">
                    <a class="dropdown-item" href="#">View</a>

                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
