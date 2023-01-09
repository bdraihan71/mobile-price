@extends('backend.app')
@section('title', 'Mobile Model')
@section('page_title', 'Mobile Model Index Page')
@prepend('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
@endprepend

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable For Mobile Brand</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="mobile_brand_datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                        <th>Model Slug</th>
                        <th>Visitor Count</th>
                        <th>Model Image</th>
                        <th>Status</th>
                        <th>Published Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobile_models as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @isset($item->mobileBrand)
                                    {{ $item->mobileBrand->brand_name }}
                                @endisset
                            </td>
                            <td>{{ $item->model_name }}</td>
                            <td>{{ $item->model_slug }}</td>
                            <td>{{ $item->visitor_count }}</td>
                            <td>
                                @if ($item->model_image)
                                    <img src={{ url('images/model_images/' . $item->model_image) }} width="50"
                                        height="50" />
                                @endif
                            </td>
                            <td>status</td>
                            <td>{{ $item->updated_at->toDayDateTimeString() }}</td>
                            <td>
                                <a href="{{ route('mobile.model.view', $item->id) }}" class="btn btn-primary"><i
                                    class="fas fa-paper-plane"></i></a>

                                <a href="{{ route('mobile.model.edit', $item->id) }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i></a>

                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-danger{{ $item->id }}"><i
                                        class="fas fa-trash-alt"></i></button>

                            </td>
                        </tr>
                        <div class="modal fade" id="modal-danger{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete {{ $item->model_name }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure for delete this <b>{{ $item->model_name }}</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">Close</button>
                                        <form action="{{ route('mobile.model.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-light">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Serial Number</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                        <th>Model Slug</th>
                        <th>Visitor Count</th>
                        <th>Model Image</th>
                        <th>Status</th>
                        <th>Published Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @push('scripts')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script>
            // datatable
            $(function() {
                $("#mobile_brand_datatable").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#mobile_brand_datatable_wrapper .col-md-6:eq(0)');
            });
            // slug generate
            $("#brand_name").focusout(function() {
                var title = $('#brand_name').val();
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/slug_generator?title=' + title + '&model=MobileBrand',
                    success: function(data) {
                        console.log(data);
                        $('#brand_slug').val(data.slug);
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            });
        </script>
    @endpush
@endsection
