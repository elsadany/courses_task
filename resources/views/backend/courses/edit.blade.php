@extends('backend.layout.master')
@section('title','Edit Course | Courses Data')
@section('content')


<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Edit Course</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('courses.index')}}">Courses</a>
                    </li>
                    <li class="breadcrumb-item">Edit Course
                    </li>

                </ol>
            </div>
        </div>
    </div>

</div>
<div class="content-body"><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Course</h4>


                </div>
                
                <form action="{{route('courses.update',['course'=>$course])}}" method="post">
                    @method('PUT')
                    @include('backend.courses._form')  
                </form>

            </div>
        </div>
    </div>
</div>





@stop()