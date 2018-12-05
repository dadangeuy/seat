@extends('layouts.frontend_master')
@section('title','Seat | Home')
@section('additional_css')
    <style type="text/css">
        .site-nav{
            float: center
        }
    </style>
@endsection
@section('content')
    <section class="slider-container" style="background-image: url(assets/frontend/images/slide-img-1-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slides">
                            <div class="slide">
                                <div class="slide-content">
                                    <h1 style="font-family: Moon"> Melayani dengan cepat </h1>
                                    <p>
                                        Dengan Aplikasi Seat pemesanan tempat di restoran <br> ataupun cafe  yang anda inginkan bisa lebih cepat
                                       
                                    </p>
                                </div>
                                <div class="slide-image">
                                    <a href="#"> <img src="{{asset('assets/frontend/images/slide-img-1.png')}}" class="img-responsive" width="60%" /> </a>
                                </div>
                            </div>
                            <div class="slide" data-bg="{{asset('assets/frontend/images/slide-img-1-bg.png')}}">
                                <div class="slide-image">
                                    <a href="#"> <img src="{{asset('assets/frontend/images/slide-img-2.png')}}" .class="img-responsive" width="70%"/> </a>
                                </div>
                                <div class="slide-content text-right">
                                    <h1 style="font-family: Moon"> Mudah diakses </h1>
                                    <p>
                                        Dengan kemudahannya Aplikasi Seat bisa diakses dimana saja <br> dan kapan saja sesuai dengan keinginan anda.
                                    </p>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide-content">
                                    <h1 style="font-family: Moon"> Solusi Terpercaya </h1>
                                    <p>
                                        Dengan Aplikasi Seat anda bisa bertransaksi dengan aman, <br> dan aplikasi seat merupakan kepercayaan pelanggan.
                                    </p>
                                </div>
                                <div class="slide-image">
                                    <a href="#"> <img src="{{asset('assets/frontend/images/slide-img-3.png')}}" class="img-responsive" / width="45%"> </a>
                                </div>
                            </div>
                            <div class="slides-nextprev-nav">
                                <a href="#" class="prev"> <i class="entypo-left-open-mini"></i> </a>
                                <a href="#" class="next"> <i class="entypo-right-open-mini"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section >
            <div class="container">
                <div class="row">
                    @include('layouts.flash_msg')
                </div>
            </div>
        </section>
        <!-- TS14566675531124 -->
        <section class="portfolio-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;margin-bottom: 20px">
                        <h1 style="font-family: Moon">Tentang Seat</h1>
                        <hr/>
                        <p style="font-size: 18px">Anda bisa dengan mudah melakukan reservasi restoran atau kafe sesuai yang anda inginkan. <br>Dan bagian terbaiknya anda bisa memilih dimana anda akan duduk. <a href="{{route('about_us')}}">Pelajari Lebih Lanjut -> </a></p>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio-item">
                            
                            <a href="{{route('booking_index')}}" class="image"> <img src="{{asset('assets/frontend/images/restoran-1.jpg')}}" class="img-rounded" style="height: 300px" /> <span class="hover-zoom"></span> </a>
                            <div><button class="btn btn-primary " style="width: 100%;font-size: 20px;font-family: Moon">Pesan Restoran</button></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio-item">
                            <a href="{{route('booking_index')}}" class="image"> <img src="{{asset('assets/frontend/images/cafe-1.jpg')}}" class="img-rounded" style="height: 300px"/> <span class="hover-zoom"></span> </a>
                            <div><button class="btn btn-primary" style="width: 100%;font-size: 20px;font-family: Moon">Pesan Kafe</button></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
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
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection