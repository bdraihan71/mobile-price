@extends('frontend.app')
@section('title', 'Mobile Brand')
@section('page_title', 'Mobile Home Page')
@prepend('styles')
@endprepend

@section('content')

    {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3">
        <h1>All Mobile Brands in Bangladesh</h1>
    </div> --}}
    {{-- <div class="row contact-us"> --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Contact us</h1>
                <p>This website is only for promotional purposes. All the information provided here is for research purposes
                    only. All the information found on this site is from numerous sources and is believed to be in the
                    public domain. Some data may be subject to interpretation and sometimes can not be 100% accurate. If you
                    have any issues or claims against the provided information, feel free to contact us below. We will
                    immediately take the necessary action.</p>
                <p>However, if you want us to promote your product or if you have any business proposals you can directly
                    contact us through this email: <strong>raihanfarhad71@gmail.com</strong>, or you can fill out the below
                    form.
                </p>
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="form-group col-md-6">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
                            value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter Your Email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Your Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Enter Your Phone Number" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label>Your Message</label>
                        <textarea class="form-control" rows="4" name="message" placeholder="Enter Your Message">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>

            </div>
        </div>
    </div>


    @push('scripts')
    @endpush
@endsection
