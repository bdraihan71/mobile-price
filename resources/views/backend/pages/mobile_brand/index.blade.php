@extends('backend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Brand Index Page')
@prepend('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
@endprepend

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Mobile Brand</h3>
                </div>
                <form method="POST" action="{{ route('mobile.brand.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name"
                                placeholder="Enter Brand Name" value="{{ old('brand_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_slug">Brand Slug</label>
                            <input type="text" class="form-control" name="brand_slug" id="brand_slug"
                                placeholder="Enter Brand Slug" value="{{ old('brand_slug') }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_title">Brand Title</label>
                            <input type="text" class="form-control" name="brand_title" id="brand_title"
                                placeholder="Enter Brand Title" value="{{ old('brand_title') }}">
                        </div>

                        <div class="form-group">
                            <label>Brand Description</label>
                            <textarea class="form-control" rows="3" name="brand_description" placeholder="Enter Brand Description">{{ old('brand_description') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Brand Keyword</label>
                            <textarea class="form-control" rows="2" name="brand_Keyword" placeholder="Enter Brand Keyword">{{ old('brand_Keyword') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="brand_image">Brand Image <small>(w:400*h:300)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="brand_image" id="brand_image">
                                    <label class="custom-file-label" for="brand_image">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <th>Brand Slug</th>
                        <th>Brand Title</th>
                        <th>Brand Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobile_brands as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->brand_name }}</td>
                            <td>{{ $item->brand_slug }}</td>
                            <td>{{ $item->brand_title }}</td>
                            <td><img src={{ url('images/brand_images/' . $item->brand_image) }} width="50"
                                    height="50" /></td>
                            <td>
                                <a href="{{ route('mobile.brand.edit', $item->id) }}" class="btn btn-primary"><i
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
                                        <h4 class="modal-title">Delete {{ $item->brand_name }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure for delete this <b>{{ $item->brand_name }}</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">Close</button>
                                        <form action="{{ route('mobile.brand.destroy', $item->id) }}" method="POST">
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
                        <th>Brand Slug</th>
                        <th>Brand Title</th>
                        <th>Brand Image</th>
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
                    url: '/slug_generator?title=' + title + '&model=MobileBrand' + '&table_slug_name=brand_slug',
                    success: function(data) {
                        console.log(data);
                        $('#brand_slug').val(data.slug);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        </script>
    @endpush
@endsection
