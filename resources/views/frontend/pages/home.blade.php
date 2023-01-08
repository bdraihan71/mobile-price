@extends('frontend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Home Page')
@prepend('styles')
@endprepend

@section('content')

    {{-- <div class="col-6 col-sm-4 col-md-4 col-lg-3 p-1">
        <div class="card homepage-card">
            <div class="card-body text-center">
                <img class="img-fluid" src="https://cdn1.smartprix.com/rx-iMke2zmd6-w420-h420/oppo-reno-9-pro-plus.webp"
                    alt="Honor Magic Vs Ultimate" width="160">
                <h6 class="text-bold mt-1">Oppo Reno9 Pro</h6>
                <h6 class="mt-3 text-danger">BDT 189,000.00</h6>
                <a href="" class="btn btn-info shadow stretched-link">View Details</a>
            </div>
        </div>
    </div> --}}

    @foreach ($models as $item)
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 p-1">
            <div class="card homepage-card">
                <div class="card-body text-center">
                    <img class="img-fluid" src="{{ asset('images/model_images/'. $item->model_image) }}"
                        alt="{{$item->model_slug}}" width="160">
                    <h6 class="text-bold mt-1">{{ $item->model_name }}</h6>
                    <h6 class="mt-3 text-danger">{{ modelPrice($item->prices) }}</h6>
                    <a href="{{ route('model.name', $item->model_slug) }}" class="btn btn-info shadow stretched-link">View
                        Details</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-1">
        <ul class="pagination justify-content-center">
            {{ $models->links('pagination::bootstrap-4') }}
        </ul>
    </div>
    @push('scripts')
    @endpush
@endsection
