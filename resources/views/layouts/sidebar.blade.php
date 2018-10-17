<div class="sidebar-menu fixed">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo" >
                <a href="{{route('home')}}"> <img src="{{asset('assets/images/logo@2x.png')}}" width="80" alt="" /> </a>
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
            <li> <a href="{{route('dashboard')}}"><i class="entypo-gauge"></i><span class="title">Dashboard</span></a> </li>
            @if(Auth::user()->hasRole('admin'))
               <li> <a href="{{route('admin_verifikasi_restoran')}}"><i class="entypo-user"></i><span class="title">Verifikasi Restoran</span></a> </li>
                <li> <a href="{{route('admin_verifikasi_topup')}}"><i class="entypo-doc-text-inv"></i><span class="title">Verifikasi Top Up</span></a> </li>

            @elseif(Auth::user()->hasRole('restoran'))
                <li> <a href="{{route('biodata_restoran_index')}}"><i class="entypo-user"></i><span class="title">Biodata Restoran</span></a> </li>
                <li> <a href="{{route('kursi_index')}}"><i class="entypo-doc-text-inv"></i><span class="title">Manajemen Tempat Duduk</span></a> </li>
                <li> <a href="{{route('manajemen_booking_index')}}"><i class="entypo-basket"></i><span class="title">Manajemen Booking Tempat</span></a> </li>
            @endif
            
        </ul>
    </div>
</div>