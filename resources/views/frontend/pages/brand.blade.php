@extends('frontend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Home Page')
@prepend('styles')
@endprepend

@section('content')

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mb-3">
        <h1>All Mobile Brands in Bangladesh</h1>
    </div>
    @foreach ($brands as $item)
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 p-1">
            <div class="card brand-card">
                <div class="card-body text-center">
                    {{-- <img class="img-fluid" src="https://cdn1.smartprix.com/rx-iMke2zmd6-w420-h420/oppo-reno-9-pro-plus.webp" --}}
                    <img class="img-fluid" src="{{ url('images/brand_images/' . $item->brand_image) }}"
                        alt="{{ $item->brand_title }}" width="160">
                    <h6 class="text-bold mt-3">{{ $item->brand_name }}</h6>
                    <a href="{{ route('brand.name', $item->brand_slug) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
    @endpush
@endsection
