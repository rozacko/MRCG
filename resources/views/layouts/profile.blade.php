<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MRCG.id</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- other css -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('/mrcg/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('/mrcg/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/mrcg/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('/mrcg/css/style.css')}}" rel="stylesheet">
    <!--  -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#27ae60;" >
            <div class="container">                
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/mrcg/img/logo.png')}}" width="80px" alt="" title="" /></img>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/set_profile">Profile</a>
                                    <a class="dropdown-item" href="/view_cart">Cart</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-5"> 
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    Hi, {{ Auth::user()->name }}
                    </div>
                    <div class="row card-body">   
                        <div class="col-md-2 container">
                        @forelse($data_profile as $data_profile)                                                
                            <img src="{{asset('storage/'.$data_profile->gambar)}}" width="150px" alt="...">
                            <b><p>{{$data_profile->nama}}<p></b>
                            <p>{{$data_profile->ttl}}<p>
                            <p>{{$data_profile->jenis_kel}}<p>
                            <p>{{$data_profile->pekerjaan}}<p>
                            <a href="/set_profile/{{$data_profile->id}}/edit" class="btn btn-success">Ubah Profile</a>  
                        @empty
                            <img src="{{ asset('/mrcg/img/team-1.jpg')}}" width="150px" alt="...">  
                            <br>
                            <a href="/set_profile/create" class="btn btn-outline-info">Atur Profile</a>
                        @endforelse                            
                        </div>
                        <div class="col-md-10">
                            <h6 class="card-title">Alamat</h6>
                            <div class="form-group">                            
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Belum ada alamat" readonly>{{$data_profile->alamat}}</textarea>
                            <br>
                            </div>
                            <a href="/address/{{$data_profile->id}}/edit" class="btn btn-info">Ubah Alamat</a>                              
                            <div class="col-lg-12 col-md-6 nav justify-content-center py-4" >
                                <a href="/view_cart" class="btn btn-Primary">Keranjang</a>
                                <a href="/view_verify" class="btn btn-Primary">Verifikasi</a>
                                <a href="/view_ordered" class="btn btn-Primary">Pengiriman</a>
                                <a href="/view_done" class="btn btn-Primary">Selesai</a>
                            </div>          
                            <main class="py-4">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>            
                </div>
            </div>
        </div>          
    </div>
</body>
</html>
