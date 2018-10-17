<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}">
    <title>Neon | Dsashboard</title>
    <link rel="stylesheet" href="{{asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}" id="style-resource-1">
    <link rel="stylesheet" href="{{asset('assets/css/font-icons/entypo/css/entypo.css')}}" id="style-resource-2">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" id="style-resource-4">
    <link rel="stylesheet" href="{{asset('assets/css/neon-core.css')}}" id="style-resource-5">
    <link rel="stylesheet" href="{{asset('assets/css/neon-theme.css')}}" id="style-resource-6">
    <link rel="stylesheet" href="{{asset('assets/css/neon-forms.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" id="style-resource-8">
    <link rel="stylesheet" href="{{asset('assets/css/skins/green.css')}}" id="style-resource-9">
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
</head>
<body class="page-body page-fade skin-green">
    <div class="page-container">
        <div class="sidebar-menu fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="#"> <img src="{{asset('assets/images/logo@2x.png')}}" width="120" alt="" /> </a>
                    </div>
                    <!-- logo collapse icon -->
                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon with-animation">
                            <i class="entypo-menu"></i> </a>
                    </div>
                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <i class="entypo-menu"></i> </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
                    <li> <a href="#"><i class="entypo-gauge"></i><span class="title">Dashboard</span></a> </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <!-- Raw Links -->
                <div class="col-md-6 col-md-offset-6 col-sm-offset-8 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        <li> <a href="#"> Log Out <i class="entypo-logout right"></i> </a> </li>
                    </ul>
                </div>
            </div>
            <hr/>
            <h2>Judul Menu</h2> <br/>
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
</body>

</html>