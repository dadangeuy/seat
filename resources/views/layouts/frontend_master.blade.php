<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}" id="style-resource-1">
    <link rel="stylesheet" href="{{asset('assets/css/font-icons/entypo/css/entypo.css')}}" id="style-resource-2">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.css')}}" id="style-resource-1">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/font-icons/entypo/css/entypo.css')}}" id="style-resource-2">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/neon.css')}}" id="style-resource-3">
    <link rel="stylesheet" href="{{asset('assets/css/neon-core.css')}}" id="style-resource-5">
    <link rel="stylesheet" href="{{asset('assets/css/neon-theme.css')}}" id="style-resource-6">
    <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}" id="style-resource-7">
    <script src="{{asset('assets/frontend/js/jquery-1.11.3.min.js')}}"></script>
    <!-- <link rel="stylesheet" href="{{asset('sweetalert/sweetalert.min.css')}}" id="style-resource-7"> -->
    @yield('additional_css')
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
</head>
<body>
    <!-- TS14566675539516 -->
    <div class="wrap">
        <!-- TS14566675537524 -->
        <div class="site-header-container container">
            <div class="row">
                <div class="col-md-12">
                    <header class="site-header">
                        <section class="site-logo">
                            <a href="frontend-main.html"> <img src="{{asset('assets/frontend/images/logo@2x.png')}}" width="70" /> </a>
                        </section>
                        <nav class="site-nav">
                            <div>
                                <ul class="main-menu hidden-xs" id="main-menu" style="text-align: center;font-size: 20px;font-family: 'Moon'">
                                    <li>
                                        <a href="{{route('home')}}"> <span>Home</span> </a>
                                    </li>
                                    <li>
                                        <a href="{{route('booking_index')}}"> <span>Service</span> </a>
                                    </li>
                                    <li>
                                        <a href="{{route('about_us')}}"> <span>About Us</span> </a>
                                    </li>
                                    <li>
                                        <a href="{{route('blog')}}"> <span>Blog</span> </a>
                                    </li>
                                    <li>
                                        <a href="{{route('faq')}}"> <span>FAQ</span> </a>
                                    </li>
                                    @guest
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @else
                                        @if(Auth::user()->hasRole('user'))
                                            <li>
                                                <a href="{{route('dashboard')}}"> <span>{{ Auth::user()->name }} </span> </a>
                                                <ul style="font-size: 14px;text-align: left;">
                                                    <li>
                                                        <a href="{{route('biodata_user_index')}}"> <i class="entypo entypo-user"></i> Biodata </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('topup_index')}}"> <i class="entypo entypo-doc-text-inv"></i> Top Up E-Wallet </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('booking_history')}}"> <i class="entypo entypo-docs"></i> History Booking </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="entypo entypo-logout"></i>
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route('dashboard')}}"> <span>{{ Auth::user()->name }} </span> </a>
                                                <ul style="font-size: 14px;text-align: left;">
                                                    <li>
                                                        <a href="{{route('dashboard')}}"> <i class="entypo entypo-gauge"></i> Dashboard </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="entypo entypo-logout"></i>
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                        @endif
                                    @endguest
                                </ul>
                            </div>
                            <div style="text-align: center;margin-top: 20px">
                                <form method="get" class="search-form" action="{{route('search_restoran')}}" enctype="application/x-www-form-urlencoded"> 
                                    <div class="col-sm-11" style="padding: 0px;margin: 0px">
                                        <input type="text" class="form-control" name="name" placeholder="Find Restaurant Or Cafe" / id="search-bar">
                                    </div>
                                    <div class="col-sm-1" >
                                        <button class="btn btn-primary" type="submit" > <i class="entypo-search" style="font-size: 18px"></i> </button>
                                    </div>

                                </form>
                            </div>
                            <div class="visible-xs">
                                <a href="#" class="menu-trigger"> <i class="entypo-menu"></i> </a>
                            </div>
                        </nav>
                    </header>
                   <!--  <section >
                        <input type="text" class="form-control" name="q" placeholder="Type to search..." />
                    </section> -->
                </div>
            </div>
        </div>
            
        @yield('content')
        <!-- TS145666755314695 -->
        <section class="testimonials-container">
            <div class="container">
                <div class="col-md-12">
                    <div class="testimonials carousel slide" data-interval="8000">
                        <div class="carousel-inner">
                            <div class="item active">
                                <blockquote>
                                    <p>
                                        Dengan Seat Kita Bisa dengan mudah pesan Restoran / Kafe tanpa harus repot - repot kesana . <br> Dengan Seat juga kita bisa memilih tempat yang kita suka dengan mudah
                                    </p> <small> <cite>Tayar Sutayar</cite> - KM ITS
</small> </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="#"> <img src="{{asset('assets/frontend/images/logo@2x.png')}}" width="60" /> </a>
                    </div>
                    <div class="col-sm-3">
                        <h5>Address</h5>
                        <p>
                            Institut Teknologi Sepuluh Nopember <br /> Jalan Raya ITS, Keputih, Sukolilo <br /> Kota Surabaya, Jawa Timur 60111
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <h5>Contact</h5>
                        <p>
                            Phone: (031) 5994251 <br /> Fax: +62 (31) 594 3358 <br /> its.ac.id
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; Seat - All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('assets/frontend/js/gsap/TweenMax.min.js')}}" id="script-resource-1"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.js')}}" id="script-resource-2"></script>
    <script src="{{asset('assets/frontend/js/joinable.js')}}" id="script-resource-3"></script>
    <script src="{{asset('assets/frontend/js/resizeable.js')}}" id="script-resource-4"></script>
    <script src="{{asset('assets/frontend/js/neon-slider.js')}}" id="script-resource-5"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="{{asset('assets/frontend/js/neon-custom.js')}}" id="script-resource-6"></script>
    <script src="{{asset('assets/js/neon-api.js')}}" id="script-resource-6"></script>
    <script src="{{asset('assets/js/cookies.min.js')}}" id="script-resource-7"></script>
    <script src="{{asset('assets/js/neon-chat.js')}}" id="script-resource-8"></script>
    <script src="{{asset('sweetalert/sweetalert.min.js')}}" id="script-resource-11"></script>
    @yield('additional_js')
</body>

</html>