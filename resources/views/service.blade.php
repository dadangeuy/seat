@extends('layouts.frontend_master')
@section('title','Seat | Service')
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
                        <h1 style="font-family: Moon">Service</h1>
                        <ol class="breadcrumb bc-3">
                            <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                            <li class="active"> <strong>Service</strong> </li>
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
        <section class="portfolio-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;margin-bottom: 20px">
                        <p style="font-size: 18px">Anda bisa dengan mudah melakukan reservasi restoran atau kafe sesuai yang anda inginkan. <br>Dan bagian terbaiknya anda bisa memilih dimana anda akan duduk. <a href="#">Pelajari Lebih Lanjut -> </a></p>
                        
                    </div>
                    
                </div>
            </div>
        </section>
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection