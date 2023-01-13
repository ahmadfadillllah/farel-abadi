<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE -->
    <title>{{ config('app.name') }}</title>
    <!-- FAVI ICON -->
    <link rel="icon" type="image/png" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/images/favi.png" sizes="32x32">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/bootstrap/css/bootstrap.min.css">
    <!-- ALL GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lobster+Two" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/fonts/linear-fonts.css">
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/fonts/font-awesome.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/owlcarousel/css/owl.theme.css">
    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/css/lightbox.min.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/css/responsive.css">
</head>

<body>
    <!-- START PRELOADER -->
    <div class="preloader">
        <div class="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- / END PRELOADER -->

    <!-- START HOMEPAGE DESIGN AREA -->
    <header id="home" class="welcome-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- START LOGO DESIGN AREA -->
                        <div class="logo">
                            <a href="javascript:void(0);">
                                <p>Farel Abadi</p>
                            </a>
                        </div>
                        <!-- END LOGO DESIGN AREA -->
                    </div>
                    <div class="col-md-9">
                        <!-- START MENU DESIGN AREA -->
                        <div class="mainmenu">
                            <div class="navbar navbar-nobg">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a>
                                        </li>
                                        <li><a class="smoth-scroll" href="{{ route('login') }}">Login</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END MENU DESIGN AREA -->
                    </div>
                </div>
            </div>
        </div>
        <div class="welcome-image-area" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="header-text">
                                    <h3>welcome to</h3>
                                    <h2>{{ config('app.name') }}</h2>
                                    <p>PERANCANGAN SISTEM PENJUALAN HASIL LAUT DENGAN MENGGUNAKAN METODE END USER DEVELOPMENT (EUD) BERBASIS WEB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- / END HOMEPAGE DESIGN AREA -->

    <!-- START BLOG DESIGN AREA -->
    <section id="blog" class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Daftar Hasil Laut</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- START SINGLE BLOG DESIGN AREA -->
                @foreach ($hasillaut as $hl)
                <div class="col-md-4 wow fadeInUp single-blog-content" data-wow-delay=".2s">
                    <div class="single-blog">
                        <img src="assets/images/blog/blog1.jpg" alt="" class="img-responsive">
                        <div class="blog-description text-center">
                            <a><h4>{{ $hl->nama }}</h4></a>
                            <img src="{{ asset('admin/mophy.dexignzone.com/xhtml/images/product') }}/{{ $hl->gambar }}" alt="">
                            <p>{{ $hl->kategori->nama }}</p>
                            <h6>Stok: {{ $hl->stok }} <sub>kg</sub></h6>
                            <a class="read-more">{{ $hl->status }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- / END SINGLE BLOG DESIGN AREA -->

                <!-- / END SINGLE BLOG DESIGN AREA -->
            </div>
        </div>
    </section>
    <!-- / END BLOG DESIGN AREA -->

    <!-- START FOOTER DESIGN AREA -->
    <footer class="footer-area wow fadeInUp" data-wow-delay="1s">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Farel Abadi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="footer-social-link text-center">
                        <p class="footer-para text-center">PERANCANGAN SISTEM PENJUALAN HASIL LAUT DENGAN MENGGUNAKAN METODE END USER DEVELOPMENT (EUD) BERBASIS WEB</p>
                    </div>
                    <div class="footer-text">
                        <h6>&copy;copyright | {{ config('app.name') }} 2023.Developed by <a href="https://adhyy.my.id">Adhy</a></h6>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- / END CONTACT DETAILS DESIGN AREA -->

    <!-- START SCROOL UP DESIGN AREA -->
    <div class="scroll-to-up">
        <div class="scrollup">
            <span class="lnr lnr-chevron-up"></span>
        </div>
    </div>
    <!-- / END SCROOL UP DESIGN AREA -->

    <!-- LATEST JQUERY -->
    <script type="text/javascript" src="{{ asset('home') }}//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- PROGRESS JS  -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.appear.js"></script>
    <!-- OWL CAROUSEL JS  -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- MIXITUP JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.mixitup.js"></script>
    <!-- MAGNIFICANT JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- STEALLER JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.stellar.min.js"></script>
    <!-- YOUTUBE JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script type="text/javascript">
        $('.player').mb_YTPlayer();
    </script>
    <!-- COUNTER UP JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/jquery.counterup.min.js"></script>
    <!-- LIGHTBOX JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/lightbox.min.js"></script>
    <!-- WOW JS -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/wow.min.js"></script>
    <!-- scripts js -->
    <script src="{{ asset('home/demo.dueza.com/spicy-html/spicy/black-color') }}/assets/js/scripts.js"></script>
</body>
</html>
