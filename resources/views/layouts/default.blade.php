<!doctype html>
<html ⚡ class="no-js" lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="amp-script-src" content="sha384-Y0FrSSt-yPThHHKJizNd4pFE98BbhYbAt7bOrlXM6fRlmOd_OrkJmWBxxUg5N0Pc">
    @section('meta')
        @include('components.meta')
    @show

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "{{env("APP_URL")}}",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "{{routes("search")}}?label={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    @yield("script")
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("themes/img/logo/logo.png")}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
{{--    <link rel="stylesheet" href="{{asset("themes/css/bootstrap.min.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/animate.min.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/magnific-popup.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/fontawesome-all.min.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/owl.carousel.min.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/nice-select.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/jquery-ui.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/odometer.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/aos.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/slick.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/default.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/style.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("themes/css/responsive.css")}}">--}}


    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- Import the `amp-list` component ... -->
    <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
    <!-- ... and the `amp-mustache` component in the header. -->
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <!-- Import the `amp-bind` component for dynamically changing the content of an `amp-list`. -->
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>



    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }


        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>

    <style amp-custom="">
        {{file_get_contents(public_path("themes/css/bootstrap.min.css"))}}
        {{file_get_contents(public_path("themes/css/animate.min.css"))}}
        {{file_get_contents(public_path("themes/css/magnific-popup.css"))}}
        {{file_get_contents(public_path("themes/css/fontawesome-all.min.css"))}}
        {{file_get_contents(public_path("themes/css/owl.carousel.min.css"))}}
        {{file_get_contents(public_path("themes/css/nice-select.css"))}}
        {{file_get_contents(public_path("themes/css/jquery-ui.css"))}}
        {{file_get_contents(public_path("themes/css/odometer.css"))}}
        {{file_get_contents(public_path("themes/css/aos.css"))}}
        {{file_get_contents(public_path("themes/css/slick.css"))}}
        {{file_get_contents(public_path("themes/css/default.css"))}}
        {{file_get_contents(public_path("themes/css/style.css"))}}
        {{file_get_contents(public_path("themes/css/responsive.css"))}}
    </style>


</head>
<body>

<amp-auto-ads type="adsense"
              data-ad-client="ca-pub-1606255134626057">
</amp-auto-ads>

<!-- Preloader -->
{{--<div id="preloader">--}}
{{--    <amp-img src="{{asset("themes/img/logo/preloader.gif")}}" height="50" width="50" alt=""--}}
{{--             layout="responsive"></amp-img>--}}
{{--</div>--}}
<!-- Preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-top-area">
                        <div class="header-top-left-text">
                            <p>We provides <span>Ads</span> for you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right-text">
                        <ul>
                            <li><a target="_blank" href="https://oboulot.io">Job Cameroun</a></li>
                            <li><a target="_blank" href="https://oboulot.fr">Job France</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
            <div class="menu-wrap">
                <nav class="menu-nav">
                    <div class="row align-items-center">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="{{request()->routeIs("home")?"active":""}}"><a
                                            href="/">Accueil</a></li>
                                    <li class="{{request()->routeIs("search")?"active":""}}"><a
                                            href="{{routes("search")}}">Recherche</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="{{asset("themes/img/logo/logo.png")}}" height="50"
                                                 alt="{{env("APP_NAME")}}"></a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-9">
                            <div class="header-action">
                                <ul>
                                    <li class="header-search">
                                        <form action="{{routes("search")}}" method="get"   target="_top">
                                            <button><i class="fas fa-search"></i></button>
                                            <input type="text" name="label" placeholder="Search ..."
                                                   value="{{request()->query("label")}}">
                                        </form>
                                    </li>
                                    {{--                                    <li class="header-user d-none d-md-block hide" hidden>--}}
                                    {{--                                        <a href="contact.html"><i class="far fa-user"></i></a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="header-shop-cart d-none d-md-flex hide" hidden>--}}
                                    {{--                                        <a href="#">--}}
                                    {{--                                            <img src="img/icon/shape-img.png" alt="">--}}
                                    {{--                                            <span class="cart-count">0</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <span class="cart-price">$0.00</span>--}}
                                    {{--                                        <ul class="minicart">--}}
                                    {{--                                            <li class="d-flex align-items-start">--}}
                                    {{--                                                <div class="cart-img">--}}
                                    {{--                                                    <a href="#"><img src="img/products/cart_p01.jpg" alt=""></a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="cart-content">--}}
                                    {{--                                                    <h4><a href="#">Exclusive Winter Jackets</a></h4>--}}
                                    {{--                                                    <div class="cart-price">--}}
                                    {{--                                                        <span class="new">$229.9</span>--}}
                                    {{--                                                        <span><del>$229.9</del></span>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="del-icon">--}}
                                    {{--                                                    <a href="#"><i class="far fa-trash-alt"></i></a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li class="d-flex align-items-start">--}}
                                    {{--                                                <div class="cart-img">--}}
                                    {{--                                                    <a href="#"><img src="img/products/cart_p02.jpg" alt=""></a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="cart-content">--}}
                                    {{--                                                    <h4><a href="#">Winter Jackets For Women</a></h4>--}}
                                    {{--                                                    <div class="cart-price">--}}
                                    {{--                                                        <span class="new">$229.9</span>--}}
                                    {{--                                                        <span><del>$229.9</del></span>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="del-icon">--}}
                                    {{--                                                    <a href="#"><i class="far fa-trash-alt"></i></a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <div class="total-price">--}}
                                    {{--                                                    <span class="f-left">Total:</span>--}}
                                    {{--                                                    <span class="f-right">$239.9</span>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <div class="checkout-link">--}}
                                    {{--                                                    <a href="#">Shopping Cart</a>--}}
                                    {{--                                                    <a class="black-color" href="#">Checkout</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <nav class="menu-box">
                    <div class="close-btn"><i class="fas fa-times"></i></div>
                    <div class="nav-logo"><a href="/"><img src="{{asset("themes/img/logo/logo.png")}}"
                                                           alt="{{env("APP_NAME")}}" title=""></a>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <div class="social-links">
                        <ul class="clearfix">
                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="menu-backdrop"></div>
            <!-- End Mobile Menu -->
        </div>
    </div>
</header>
<!-- header-area-end -->


<!-- main-area -->
<main>

    @yield('content')

</main>
<!-- main-area-end -->

<!-- footer-area -->
<footer>
    <div class="footer-top-wrap" hidden>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="fw-title">Know Us</h4>
                        <div class="fw-link">
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="fw-title">Our Policies</h4>
                        <div class="fw-link">
                            <ul>
                                <li><a href="about-us.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                    <div class="footer-widget">
                        <h4 class="fw-title">Our Services</h4>
                        <div class="fw-link">
                            <ul>
                                <li><a href="about-us.html">Order Medicines</a></li>
                                <li><a href="contact.html">Book Lab Tests</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-widget">
                        <h4 class="fw-title">Subscribe Our Newsletter</h4>
                        <div class="f-newsletter">
                            <p>Get a free subscription to our health & fitness</p>
                            <form action="{{routes("search")}}" method="get"   target="_top" class="newsletter-form">
                                <input type="text" placeholder="Enter Your Email Address">
                                <button><i class="fas fa-rocket"></i></button>
                            </form>
                        </div>
                        {{--                        <div class="fw-download-btn">--}}
                        {{--                            <a href="#"><img src="img/icon/download_btn01.png" alt=""></a>--}}
                        {{--                            <a href="#"><img src="img/icon/download_btn02.png" alt=""></a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-counter-wrap">
            <div class="row">
                <div class="col-12">
                    <div class="fcw-title text-center mb-45">
                        <h4 class="title">world LARGEST HEALTHCARE PLATFORM</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="counter-item mb-30">
                        <h2 class="count"><span class="odometer" data-count="16"></span>M+</h2>
                        <p>Visiteurs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="counter-item mb-30">
                        <h2 class="count"><span class="odometer" data-count="33"></span>K+</h2>
                        <p>Médicaments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="counter-item mb-30">
                        <h2 class="count"><span class="odometer" data-count="100"></span>+</h2>
                        <p>Spécialités</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>Copyright © {{\Carbon\Carbon::now()->year}} {{env("APP_NAME")}}. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-method-img text-center text-md-right">
                        <img hidden src="{{asset("themes/img/images/card.png")}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<amp-analytics type="gtag" data-credentials="include">
    <script type="application/json">
{
  "vars" : {
    "gtag_id": "G-1PJ4NCFRNV",
    "config" : {
      "G-1PJ4NCFRNV": { "groups": "default" }
    }
  }
}
</script>
</amp-analytics>

<!-- JS here -->
{{--<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}


{{--<script type="text/plain" target="amp-script" id="">--}}
{{--  {{file_get_contents(public_path("themes/js/vendor/jquery-3.5.0.min.js"))}}--}}
{{--</script>--}}
{{--<script type="text/plain" target="amp-script" id="">--}}
{{--  {{file_get_contents(public_path("themes/js/bootstrap.min.js"))}}--}}
{{--</script>--}}


<amp-script layout="container" src="{{asset("themes/js/isotope.pkgd.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/imagesloaded.pkgd.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.magnific-popup.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/owl.carousel.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.odometer.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.nice-select.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.countdown.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.easypiechart.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.inview.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery.appear.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/slick.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/jquery-ui.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/ajax-form.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/wow.min.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/aos.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/plugins.js")}}">
    <div style="height: 1px"></div>
</amp-script>
<amp-script layout="container" src="{{asset("themes/js/main.js")}}">
    <div style="height: 1px"></div>
</amp-script>
</body>
</html>
