<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

    TemplateMo 558 Klassy Cafe

    https://templatemo.com/tm-558-klassy-cafe

    -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Menu Start ***** -->


                    <ul class="nav">
                        <li><a href="/redirects" class="logo"><img src="assets/images/klassy-logo.png" id="logo-image"></a></li>
                        <li class="scroll-to-section"><a href="/redirects">Főoldal</a></li>
                        <li class="scroll-to-section"><a href="/redirects">Rólunk</a></li>
                        <li class="clean-current-button"><a href="#top">Menü</a></li>
                        <li class="scroll-to-section"><a href="/redirects">Alapítók</a></li>
                        <li class="scroll-to-section"><a href="/redirects">Kapcsolat</a></li>
                        <li class="scroll-to-section" style="background-color: rgba(231,231,231,0.91); border-radius: 20px " >
                            @auth
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                    Kosár[{{$count }}]
                                </a>
                            @endauth

                            @guest
                                <a href="{{url('/login')}}">
                                    Kosár[0]
                                </a>
                            @endguest

                        </li>
                        <!-- Felhasznalo actionok eleje -->
                        <li>
                            @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-left">
                        @auth
                            <li><a href="{{ route('profile.show') }}">
                                    Profilom
                                </a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button  href="{{ route('logout') }}"
                                             class="clean-button">
                                        {{ __('Kilépés') }}
                                    </button>
                                </form>
                            </li>

                        @else
                            <li> <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Bejelentkezés</a></li>

                            @if (Route::has('register'))
                                <li>   <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Regisztrálás</a></li>
                @endif
                @endauth
            </div>
            @endif

            <!-- ***** Menu End ***** -->

        </div>
    </div>

</header>

<div id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Ételek listája kezdődőik -->
<section class="section" id="menu">
<div class="grid-container">
    @foreach($data as $fooddata)
        <form action="{{url('/addcart',$fooddata->id)}}" method="post">
            @csrf
            <div class="grid-item">
                <div style="background-image: url('/foodimage/{{$fooddata->image}}');" class='card'>
                    <div class="price"><h6>{{$fooddata->price}} Ft</h6></div>
                    <div class='info'>
                        <h1 class='title'>{{$fooddata->title}}</h1>
                        <p class='description'>{{$fooddata->description}}</p>
                        <div class="main-text-button">
                            <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                        </div>
                    </div>
                </div>
                <input type="number" name="quantity" min="1" value="1" class="clean-quantity-set">
                <input class="cart-button" type="submit" value="add to cart">

            </div>
        </form>
    @endforeach
</div>
</section>

<!--Ételek listája végződik -->




<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });

</script>
</body>
</html>
