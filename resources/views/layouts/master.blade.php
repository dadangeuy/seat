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
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" id="style-resource-4">
    <link rel="stylesheet" href="{{asset('assets/css/neon-core.css')}}" id="style-resource-5">
    <link rel="stylesheet" href="{{asset('assets/css/neon-theme.css')}}" id="style-resource-6">
    <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" id="style-resource-8">
    <link rel="stylesheet" href="{{asset('assets/css/skins/facebook.css')}}" id="style-resource-9">
    <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}" id="style-resource-7">
    <!-- <link rel="stylesheet" href="{{asset('sweetalert/sweetalert.min.css')}}" id="style-resource-7"> -->
    @yield('additional_css')
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
</head>
<body class="page-body page-fade skin-facebook">
    <div class="page-container">
        @include('layouts.sidebar')
        <div class="main-content">
            <div class="row">
                <!-- Raw Links -->
                <div class="col-xs-12 col-sm-12 clearfix">
                    <ul class="list-inline links-list pull-right">
                        <li> <a href="{{ route('logout') }}"> Log Out <i class="entypo-logout right"></i> </a> </li>
                    </ul>
                </div>
            </div>
            <hr/>
            
            @yield('content')
        </div>
    </div>
    <script src="{{asset('assets/js/gsap/TweenMax.min.js')}}" id="script-resource-1"></script>
    <script src="{{asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}" id="script-resource-2"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}" id="script-resource-3"></script>
    <script src="{{asset('assets/js/joinable.js')}}" id="script-resource-4"></script>
    <script src="{{asset('assets/js/resizeable.js')}}" id="script-resource-5"></script>
    <script src="{{asset('assets/js/neon-api.js')}}" id="script-resource-6"></script>
    <script src="{{asset('assets/js/cookies.min.js')}}" id="script-resource-7"></script>
    <script src="{{asset('assets/js/neon-chat.js')}}" id="script-resource-8"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="{{asset('assets/js/neon-custom.js')}}" id="script-resource-9"></script>
    <!-- Demo Settings -->
    <script src="{{asset('assets/js/neon-demo.js')}}" id="script-resource-10"></script>
    <script src="{{asset('assets/js/neon-skins.js')}}" id="script-resource-11"></script>
    <script src="{{asset('js/slick.js')}}" id="script-resource-11"></script>
    <script src="{{asset('sweetalert/sweetalert.min.js')}}" id="script-resource-11"></script>
    @yield('additional_js')
</body>

</html>