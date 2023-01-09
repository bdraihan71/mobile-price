@extends('backend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Brand Edit Page')
@prepend('styles')
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
                <form method="POST" action="{{ route('mobile.brand.update', $mobile_brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name"
                                placeholder="Enter Brand Name" value="{{ $mobile_brand->brand_name }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_slug">Brand Slug</label>
                            <input type="text" class="form-control" name="brand_slug" id="brand_slug"
                                placeholder="Enter Brand Slug" value="{{ $mobile_brand->brand_slug }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_title">Brand Title</label>
                            <input type="text" class="form-control" name="brand_title" id="brand_title"
                                placeholder="Enter Brand Title" value="{{ $mobile_brand->brand_title }}">
                        </div>

                        <div class="form-group">
                            <label>Brand Description</label>
                            <textarea class="form-control" rows="3" name="brand_description" placeholder="Enter Brand Description">{{ $mobile_brand->brand_description }}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Brand Keyword</label>
                            <textarea class="form-control" rows="2" name="brand_Keyword" placeholder="Enter Brand Keyword">{{ $mobile_brand->brand_Keyword }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="brand_image">Brand Image <small>(w:400*h:300)</small></label> 
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="brand_image" id="brand_image"
                                        value="{{ old('brand_image') }}">
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

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Mobile Brand Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name:</label> {{ $mobile_brand->brand_name }}
                    </div>

                    <div class="form-group">
                        <label for="brand_slug">Brand Slug:</label> {{ $mobile_brand->brand_slug }}
                    </div>

                    <div class="form-group">
                        <label for="brand_title">Brand Title:</label> {{ $mobile_brand->brand_title }}
                    </div>

                    <div class="form-group">
                        <label>Brand Description:</label> {{ $mobile_brand->brand_description }}
                    </div>


                    <div class="form-group">
                        <label>Brand Keyword:</label> {{ $mobile_brand->brand_Keyword }}
                    </div>

                    <div class="form-group">
                        <label for="brand_image">File Image: </label> <img src={{ url('images/brand_images/' . $mobile_brand->brand_image) }} width="200"
                        height="200" />
                    </div>

                </div>

                <div class="card-footer">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
