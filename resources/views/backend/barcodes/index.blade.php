@extends('backend.layout.master')

@section("title") Barcodes @stop

@section('content')
@breadcrumb([
    'title'=>'Barcodes',
    'links'=>[
        'Barcodes'=>''
    ]
])

<div class="content-body">
    <section id="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Barcodes</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @include('backend.barcodes.create') --}}
                            <br>
                            <hr>
                            <br>
                            <table class="barcodes-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Barcode</th>
                                        <th>Expire Date</th>
                                        <th>Plus</th>
                                        <th>Used</th>
                                        <th>Catalog</th>
                                        <th>Order ID</th>
                                        <th>Partner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

            $('.barcodes-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ],
                pageLength:30,
                processing: true,
                serverSide: true,
                ajax: "{{ route('barcodes') }}",
                columns: [
                    {data: 'id', name: 'barcodes.id'},
                    {data: 'barcode', name: 'barcode'},
                    {data:'expiry_date',name:'expiry_date'},
                    {data: 'plus', name: 'Plus', searchable: false},
                    {data: 'used', name: 'Used', searchable: false},
                    {data: 'catalog', name: 'catalogs.name'},
                    {data: 'order_id', name: 'orders.id'},
                    {data: 'partner', name: 'partners.organization_name'},
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