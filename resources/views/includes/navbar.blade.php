<!-- Navbar -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home')}}" class="navbar-brand mr-auto">
            <img src="{{ url('frontend/images/Tulisan Termo.png') }}" alt="Tulisan Termo">
        </a>

        <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navb"
            aria-expanded="false"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mr-md-2">
                    <a href="{{ route('home')}}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ route('daftar_peternak')}}" class="nav-link">Peternak</a>
                </li>
                <li class="nav-item mr-md-2">
                    <a href="{{ route('daftar_penyuluhan')}}" class="nav-link">Penyuluhan</a>
                </li>
            </ul>
        </div>
        @guest
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none ml-4">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0" 
                type="button" 
                onclick="event.preventDefault();  location.href='{{ url('login') }}';">
                    Masuk
                </button>
            </form>

            <!-- Dekstop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
                type="button" 
                onclick="event.preventDefault();  location.href='{{ url('login') }}';">
                    Masuk
                </button>
            </form>
        @endguest

        @auth
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" 
            method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0">
                    Logout
                </button>
            </form>

            <!-- Dekstop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" 
            method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                    Logout
                </button>
        </form>
        @endauth
    </nav>
</div>