<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    {{-- <title>Mobile Price | @yield('title')</title> --}}
    {!! SEOMeta::generate() !!}
    <meta name="revisit-after" content="2 days" />
    <meta name="copyright" content="mobilekhor.com" />

    {!! OpenGraph::generate() !!}

    {!! JsonLd::generate() !!}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- my style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7DHNJ4GXVM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7DHNJ4GXVM');
    </script>

    <!-- for google adsense
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8064548605275187"
        crossorigin="anonymous"></script>-->
    
        {{-- for popunder ads --}}
    <script type='text/javascript' src='//pl22297839.toprevenuegate.com/26/ba/17/26ba17fe0c8833a40cb079f367717113.js'>
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-2 mb-2">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="mobilekhor logo"
                        width="320"></a>
            </div>
        </div>
    </div>
    @include('frontend.partials.top_nav')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                {{-- search  --}}
                <div class="input-group">
                    <input type="text" class="form-control" id="search_mobile" placeholder="Search mobile"
                        autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

                <div id="search_result"></div>

                <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none mt-4">
                    @include('frontend.partials.nav_mobile_brand')
                    @include('frontend.partials.nav_mobile_price')
                </div>

                <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <div class="mt-3 homesidebar">
                        <h5 class="bg-info text-center text-bold p-2">Mobile Brands</h5>
                        @include('frontend.partials.left_sidebar_mobile_brand')
                    </div>

                    <div class="mt-3 homesidebar">
                        <h5 class="bg-info text-center text-bold p-2">Price Range</h5>
                        @include('frontend.partials.left_sidebar_mobile_price')
                    </div>

                    <div class="mt-3 homesidebar">
                        <h5 class="bg-info text-center text-bold p-2">Popular Mobile</h5>
                        @include('frontend.partials.left_sidebar_popular_mobile')
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-info mt-2">
        <div class="container">
            <div class="row pt-3">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h5 class="underline-heading">About Us</h4>
                        <p>We have a dedicated research team who are very passionate and always up to date with new
                            features and specifications of the latest phones and gadgets. Our team tirelessly work
                            around the clock to bring you the latest information and best reviews. We really hope you
                            will be benefited using our services.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 footer-link">
                    <h5 class="underline-heading">Useful Links</h5>
                    <ul>
                        <li> <a href="{{ route('home') }}">Home</a></li>
                        <li> <a href="{{ route('brand') }}">Brand</a></li>
                        <li> <a href="{{ route('contact.index') }}">Contact</a></li>
                        <li> <a href="{{ route('about') }}">About</a></li>
                        <li> <a href="{{ route('privacyandpolicy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 footer-social-link">
                    <h5 class="underline-heading">Social Media</h5>
                    <ul>
                        <li> <a href="https://www.facebook.com/mobilekhor" target="_blank"><i
                                    class="fab fa-facebook-square"></i></a></li>
                    </ul>
                </div>

                <div class="col-12">
                    <p>&copy; 2024 <a href="https://mobilekhor.com" class="text-white">mobilekhor.com</a> || All rights
                        reserved</p>
                </div>
            </div>
        </div>
    </footer>

    @include('sweetalert::alert')

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        $("#search_mobile").keyup(function() {
            var searchData = $('#search_mobile').val();
            if (searchData.length > 0) {
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/mobile_search/' + searchData,
                    success: function(result) {
                        console.log(result);
                        $('#search_result').html(result);
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            }
            if (searchData.length < 1) $('#search_result').html("");

        });
    </script>
    @stack('scripts')
    <!-- social bar ads -->
    <script type='text/javascript' src='//pl22239887.toprevenuegate.com/fd/0c/cb/fd0ccba1e2feadb07bc06cea2af83ba0.js'>
    </script>
</body>

</html>
