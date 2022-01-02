@extends('backend.layout.master')

@section('title','Courses')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Courses</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        Courses
                    </li>

                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
            <a  class="btn btn-success round btn-min-width mr-1 mb-1" href="{{route('courses.create')}}">Create Course</a>
        </div>
    </div>
</div>

<div class="content-body" ><!-- Default styling start -->

    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Courses</h4>


                </div>
                <div class="card-content container collapse show">

                    <div class="table-responsive">
                        <table class="table courses_table  ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>Hours</th>
                                    <th>Rating</th>
                                    <th>Level</th>
                                    
                                   
                                    <th>Published?</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                        </table>

                    </div>
                   
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    @deletejs
    <script>
        $(document).ready(function(){
        

            $('.edit-row').click(function(){
                var id=$(this).data('id');
                $('#span-'+id).hide();
                $('#form-'+id).show();
                $(this).hide();
                $(this).next().show();
            });
            $('.edit-cancle').click(function(){
                var id=$(this).data('id');
                $('#span-'+id).show();
                $('#form-'+id).hide();
                $(this).hide();
                $(this).prev().show();
            });
        });
    </script>
@endpush

@push('script')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    {{-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.courses_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ],
                pageLength:30,
                processing: true,
                serverSide: true,
                ajax: "{{ route('courses.index') }}",
                columns: [
                    {data: 'id', name: 'courses.id'},
                    {data: 'Name', name: 'courses.name'},
                    {data: 'Description', name: 'courses.description'},
                    {data: 'Category', name: 'courses.category'},
                    {data: 'Views', name: 'courses.views'},
                    {data: 'Hours', name: 'courses.Hours'},
                    {data: 'Rating', name: 'courses.rating'},
                    {data: 'Level', name: 'courses.level'},
                    {data: 'Activation', name: 'courses.activation'},
            
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            // $('.barcodes-table').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'excel', 'pdf','print'
            //     ]
            // });
        });

    </script>
@endpush