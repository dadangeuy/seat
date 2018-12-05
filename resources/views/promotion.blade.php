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
        <!-- TS14566675531124 -->
        <section class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h1 style="font-family: Moon">Promotion</h1>
                        <ol class="breadcrumb bc-3">
                            <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                            <li class="active"> <strong>Promotion</strong> </li>
                        </ol>
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
            <section class="slider-container" style="background-image: url(assets/frontend/images/slide-img-1-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slides">
                            <div class="slide">
                                <div class="slide-content">
                                    <h1 style="font-family: Moon"> KFC Buy 1 Get 1 </h1>
                                    <p>
                                        Khusus Pembelian Paket Super Besar 2<br> Gratis Paket Super Besar 1
                                    </p>
                                </div>
                                <div class="slide-image">
                                    <a href="#"> <img src="/images/KFC.png" class="img-responsive" width="60%" /> </a>
                                </div>
                            </div>
                            <div class="slide" data-bg="{{asset('assets/frontend/images/slide-img-1-bg.png')}}">
                                <div class="slide-image">
                                    <a href="#"> <img src="/images/MCD.png" .class="img-responsive" width="70%" height="10%"/> </a>
                                </div>
                                <div class="slide-content text-right">
                                    <h1 style="font-family: Moon"> MCD Buy 1 Get 1 </h1>
                                    <p>
                                        Khusus Pembelian Paket Happy Meal <br> Dapatkan Gratis Paket Panas 1.
                                    </p>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide-content">
                                    <h1 style="font-family: Moon"> CFC Disc 50% </h1>
                                    <p>
                                        Khusus Bulan Desember 2018! <br> All Menu Disc 50%.
                                    </p>
                                </div>
                                <div class="slide-image">
                                    <a href="#"> <img src="/images/cfc.png" class="img-responsive" / width="45%"> </a>
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

@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection