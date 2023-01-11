<nav class="navbar navbar-expand-lg navbar-dark bg-info my-top-nav">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto top-nav">
                <li class="nav-item {{request()->routeIs('home*') ? 'active-nav' : '' }}">
                    <a class="nav-link ml-2" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item {{request()->routeIs('brand*') ? 'active-nav' : '' }}">
                    <a class="nav-link ml-2" href="{{route('brand')}}">Brand</a>
                </li>
                <li class="nav-item {{request()->routeIs('contact*') ? 'active-nav' : '' }}">
                    <a class="nav-link ml-2" href="{{route('contact.index')}}">Contact</a>
                </li>
                <li class="nav-item {{request()->routeIs('about') ? 'active-nav' : '' }}">
                    <a class="nav-link ml-2" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item {{request()->routeIs('privacyandpolicy') ? 'active-nav' : '' }}">
                    <a class="nav-link ml-2" href="{{route('privacyandpolicy')}}">Privacy Policy</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Disclamer</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
