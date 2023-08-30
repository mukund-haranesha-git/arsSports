@php
    $category = \App\Models\Category::where('status','active')->get();
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>{{ config('app.name') }}</title>
    <link href="{{ URL::asset('website/assets/images/favicon.ico')}}" rel="shortcut icon" type="image/png">
    <link href="{{ URL::asset('website/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/css-plugin-collections.css')}}" rel="stylesheet" />
    <link id="menuzord-menu-skins" href="{{ URL::asset('website/assets/css/menuzord-skins/menuzord-boxed.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('website/assets/css/style-main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/colors/theme-skin-lemon.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/preloader.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('website/assets/css/style-main-dark.css')}}" rel="stylesheet" type="text/css" id="link-bg-color">
    <link href="{{ URL::asset('website/assets/js/revolution-slider/css/settings.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('website/assets/js/revolution-slider/css/layers.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('website/assets/js/revolution-slider/css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('website/assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ URL::asset('website/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('website/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('website/assets/js/jquery-plugin-collection.js')}}"></script>
    <script src="{{ URL::asset('website/assets/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ URL::asset('website/assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
</head>
<body class="dark">
<div id="wrapper">
    <div id="preloader">
        <div id="spinner">
            <img src="{{ URL::asset('website/assets/images/preloaders/1.gif')}}" alt="">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <header id="header" class="header">
        <div class="header-top sm-text-center bg-theme-colored">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <nav>
                            <ul class="list-inline sm-text-center text-left flip mt-5">
                                <li>
                                    <a class="text-black" href="#">FAQ</a>
                                </li>
                                <li class="text-black">|</li>
                                <li>
                                    <a class="text-black" href="#">Help Desk</a>
                                </li>
                                <li class="text-black">|</li>
                                <li>
                                    <a class="text-black" href="#">Support</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="widget m-0 mt-5 no-border">
                            <ul class="list-inline text-right sm-text-center">
                                <li class="pl-10 pr-10 mb-0 pb-0">
                                    <div class="header-widget text-black">
                                        <i class="fa fa-phone"></i> 123-456-789
                                    </div>
                                </li>
                                <li class="pl-10 pr-10 mb-0 pb-0">
                                    <div class="header-widget text-black">
                                        <i class="fa fa-envelope-o"></i> contact@yourdomain.com
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-right flip sm-text-center">
                        <div class="widget m-0">
                            <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm">
                                <li class="mb-0 pb-0">
                                    <a href="#">
                                        <i class="fa fa-facebook text-black"></i>
                                    </a>
                                </li>
                                <li class="mb-0 pb-0">
                                    <a href="#">
                                        <i class="fa fa-twitter text-black"></i>
                                    </a>
                                </li>
                                <li class="mb-0 pb-0">
                                    <a href="#">
                                        <i class="fa fa-instagram text-black"></i>
                                    </a>
                                </li>
                                <li class="mb-0 pb-0">
                                    <a href="#">
                                        <i class="fa fa-linkedin text-black"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="header-nav-wrapper bg-light navbar-scrolltofixed">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="menuzord-right" class="menuzord orange no-bg">
                                <a class="menuzord-brand stylish-header pull-left flip pb-0" href="javascript:void(0)">
                                    <img src="{{ URL::asset('website/assets/images/ars.jpg')}}" alt="">
                                </a>
                                <ul class="menuzord-menu">
                                    <li class="active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    @if(!empty($category) && count($category)>0)
                                        <li>
                                            <a href="#">Products</a>
                                            <ul class="dropdown">
                                                @foreach($category as $cat)
                                                    <li>
                                                        <a href="">{{$cat['name']}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                    <li class="">
                                        <a href="{{url('contact_us')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        @yield('content')
    </div>

    <footer class="footer divider layer-overlay overlay-dark" data-bg-img="{{ URL::asset('website/assets/images/bg/bg6.jpg')}}">
        <div class="container pt-100 pb-30">
            <div class="row mb-50">
                <div class="col-sm-4 col-md-4 mb-sm-60">
                    <div class="contact-icon-box p-30">
                        <div class="contact-icon bg-theme-colored">
                            <i class="fa fa-map-marker text-white font-22"></i>
                        </div>
                        <h4 class="text-uppercase text-white">Address</h4>
                        <p class="font-16">09 Movers and Packers,Design Street,Victoria,Australia</p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-sm-60">
                    <div class="contact-icon-box p-30">
                        <div class="contact-icon bg-theme-colored">
                            <i class="fa fa-envelope-o text-white font-22"></i>
                        </div>
                        <h4 class="text-uppercase text-white">mail us</h4>
                        <p class="font-16">Get support via <br>
                            <a class="" href="mailto:mail@kodesolution.com" target="_top" style="color: #78F805 !important">email : mail@kodesolution.com </a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="contact-icon-box p-30">
                        <div class="contact-icon bg-theme-colored">
                            <i class="fa fa-phone text-white font-22"></i>
                        </div>
                        <h4 class="text-uppercase text-white">PHONE / FAX</h4>
                        <p class="font-16">+1 123 456 789 <br> +1 123 456 789 </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <img class="mt-10 mb-20" alt="" src="{{ URL::asset('website/assets/images/logo-wide-white.png')}}">
                        <p class="font-12">Corporis dolor soluta officiis quam, repudiandae, culpa nostrum maiores dignissimos quod expedita, aliquid magnam tempore iste minima quaerat adipisci veniam.</p>
                        <ul class="styled-icons icon-bordered small square list-inline mt-10">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook text-white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter text-white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-skype text-white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-youtube text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Pages</h5>
                        <ul class="list angle-double-right list-border">
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Volunteers</a>
                            </li>
                            <li>
                                <a href="#">Causes</a>
                            </li>
                            <li>
                                <a href="#">Events</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Quick Links</h5>
                        <ul class="list angle-double-right list-border">
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Donor Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Disclaimer</a>
                            </li>
                            <li>
                                <a href="#">Terms of Use</a>
                            </li>
                            <li>
                                <a href="#">Copyright Notice</a>
                            </li>
                            <li>
                                <a href="#">Media Center</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Opening Hours</h5>
                        <ul class="opening-hours list-border">
                            <li>
                                <p>
                                    <span class="text-white">Monday To Friday:</span>
                                    <br> 9:00 am to 9:00 pm
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span class="text-white">Monday To Friday:</span>
                                    <br> 9:00 am to 9:00 pm
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span class="text-white">Monday To Friday:</span>
                                    <br> 9:00 am to 9:00 pm
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copy-right p-20">
            <div class="row text-center">
                <div class="col-md-12">
                    <p class="font-11 text-white m-0">Copyright &copy;2015 ThemeMascot. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
</div>
<script src="{{ URL::asset('website/assets/js/calendar-events-data.js')}}"></script>
<script src="{{ URL::asset('website/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('website/assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
</body>
</html>
