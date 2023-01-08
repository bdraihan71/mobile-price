@extends('frontend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Home Page')
@prepend('styles')
@endprepend

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-4">About Us</h1>
                <p>We are passionate about new technology and gadgets especially mobile phones. We have a dedicated research
                    team who are always up to date with new features and specifications of the latest phones and gadgets. We
                    promise that you will never get disappointed or misled by our information.
                </p>
                <p>Mobilekhor.com provides mostly accurate information like specifications, prices, and reviews. At the
                    moment we are only concentrating on various brands’ mobile phones.
                </p>
                <p>Our dedicated team tirelessly works around the clock to bring you the fastest and latest information in
                    order for you to choose the best mobile phones available.
                </p>
                <p>We provide official as well as unofficial prices based on the official website of the brand and various
                    shops around the country respectively.</p>
                <p>We only want the best for our visitors. That's why we always try to add new features and improve as much
                    as possible. You guys are our inspiration. We hope you will be benefited from and appreciated our
                    dedication.</p>
            </div>
        </div>
    </div>


    @push('scripts')
    @endpush
@endsection
