<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MRCG.id</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Favicons -->
  <link href="{{ asset('/mrcg/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('/mrcg/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('/mrcg/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('/mrcg/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/mrcg/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('/mrcg/css/style.css')}}" rel="stylesheet">

  <!-- Bootstrap tambahan-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- CSS tambahan-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="{{ asset('/mrcg/img/logo.png')}}" width="80px" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="#hero">Home</a></li> -->
          <!-- <li><a href="#about">About Us</a></li> -->
          <li><a href="#services">Services</a></li>
          <li><a href="#oursales">Our Sales</a></li>
          <li class="menu-has-children">
              @guest                
                  <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                      <a href="{{ route('register') }}">{{ __('Register') }}</a>                    
                @endif
              @else
                  <a id="navbarDropdown" href="#" >
                      {{ Auth::user()->name }}
                  </a>
                  <ul>
                    <li><a class="dropdown-item" href="/set_profile">Profile</a></li>
                    <li><a class="dropdown-item" href="/view_cart">Cart</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form></li>
                  </ul>
              @endguest
              </li>            
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <img src="{{ asset('/mrcg/img/logo.png')}}" width="200px" alt="" title="" /></img>
      <h1>Welcome to MRCG.id</h1>
      <h2>Make you relax with kitchen</h2>
      <a href="#services" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Services</h3>
          <p class="section-description">Join with us</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-shopping-bag"></i></a></div>
              <h4 class="title"><a href="">Order</a></h4>
              <p class="description">Select and order the desired vegetable ingredients</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-phone"></i></a></div>
              <h4 class="title"><a href="">Verification</a></h4>
              <p class="description">Admin will verify your order at 12 p.m</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-paper-plane"></i></a></div>
              <h4 class="title"><a href="">Delivery</a></h4>
              <p class="description">The courier will send your order at 18 p.m</p>
            </div>
          </div>
      </div>
    </section><!-- #services -->

    <!--==========================
      oursales Section
    ============================-->
    <section id="oursales">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Our Sales</h3>
          <p class="section-description">Select and order the desired vegetable ingredients</p>
        </div>
        <div class="row">

          <div class="container col-lg-8">
            <div class="form-group">
			    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Search">
			 </div>
          </div>
        </div>
        <div class="row py-5" id="">          
            @foreach($barang ?? '' as $Barang)
            <div class="col-lg-3 py-2 col-md-6 card" style="width: 18rem;">
      			  <img src="{{asset('storage/' .$Barang->gambar)}}" class="card-img-top" alt="...">
      			  <div class="card-body">
      			    <h5 class="card-title">{{$Barang->nama}}</h5>
                <b><p class="card-text" >Rp. {{number_format($Barang->harga,2)}}</p></b>
      			    <p class="card-text small">{{$Barang->satuan}}</p>
                <a href="javascript:void(0)" class="add_to_cart btn btn-outline-success btn-sm" id="{{ $Barang->kd_barang }}" value="{{ $Barang->harga }}">Add</a>
                <a href="javascript:void(0)" id="{{ $Barang->kd_barang }}" class="pick_up btn btn-outline-danger btn-sm">Pick Up</a>
      			  </div>
      			</div>            
            @endforeach
        </div>
      </div>
    </section><!-- #oursales -->
    <!-- dialog cart  -->
    <!-- Modal -->
    <div class="modal fade" id="add_to_cart_Modal" tabindex="-1" aria-labelledby="add_to_cart_ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add_to_cart_ModalLabel">Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="data_add_to_cart_Modal">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end cart -->
    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text">If you want to ask something and cooperate with us</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://api.whatsapp.com/send?phone=6281234619720&text=Nama%20:%0AAlamat%20:%0ABarang%20Pesanan:">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->    

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Facts</h3>
          <p class="section-description">We serve customers</p>
        </div>
        <div class="row counters">

  				<div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>Personal</p>
  				</div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">21</span>
            <p>Chatering</p>
  				</div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>Restaurant</p>
  				</div>
  			</div>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact Us</h3>
          <p class="section-description">You can contact us here</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.568961078569!2d112.63873249999999!3d-7.1757202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd8018258e7da8b%3A0xb57e5a5e94b63c5c!2sSARAMBA%20COFFE!5e0!3m2!1sid!2sid!4v1606641854056!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-12">

            <div class="info">
              <div class="inline-block">
                <i class="fa fa-map-marker"></i>
                <p>Saramba Coffe,<br>Gresik</p>
              </div>

              <div class="inline-block">
                <i class="fa fa-envelope"></i>
                <p>mrcg.id@gmail.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+62889 9690 6232</p>
              </div>

              <div>
                <i class="fa fa-instagram"></i>
                <p>@mrcg.id</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #contact -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>zora.tech</strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('/mrcg/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/easing/easing.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/wow/wow.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ asset('/mrcg/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('/mrcg/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('/mrcg/js/main.js')}}"></script>

  <script>
  $(document).on('click','.add_to_cart', function() {
    $("#data_add_to_cart_Modal").html("loading...");
    var id = $(this).attr('id');
    var value = $(this).attr('value');

    $("#add_to_cart_Modal").modal('show');
    $.get("/cart/"+id+"/"+value, function(data) {
        $("#data_add_to_cart_Modal").html(data);

    });
  });

  $(document).on('click','.pick_up', function() {
    $("#data_add_to_cart_Modal").html("loading...");
    var id = $(this).attr('id');

    $("#add_to_cart_Modal").modal('show');
    $.get("/pick_up/"+id, function(data) {
        $("#data_add_to_cart_Modal").html(data);

    });
  });  
  </script>
</body>
</html>