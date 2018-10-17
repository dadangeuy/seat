@extends('layouts.frontend_master')
@section('title','Seat | Service')
@section('additional_css')
    <link rel="stylesheet" href="{{asset('css/slick.css')}}" id="style-resource-7">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}" id="style-resource-7">
    <style type="text/css">
        .slick-arrow{
            color: black;    
        }
    </style>
@endsection
@section('content')
    
    <section class="portfolio-item-details">
        <div class="container">
            <div class="row item-title">
                <div class="col-sm-9">
                    <h1 style="font-family: Moon"> <a href="#">{{$data->user->name}}</a> </h1>
                </div>
            </div>
            <div class="row">
                @include('layouts.flash_msg')
                <div class="col-md-7">
                    <div class="list-slider" >
                        <div style="text-align: center">
                            <img id="image1" src="{{asset('images')}}/{{$data->image1}}" style="width: 550px;margin: 0 auto;">
                        </div>
                        @if($data->image2!=NULL)
                        <div style="text-align: center">
                            <img id="image1" src="{{asset('images')}}/{{$data->image2}}" style="width: 550px;margin: 0 auto;">
                        </div>
                        @endif
                        @if($data->image2!=NULL)
                        <div style="text-align: center">
                            <img id="image1" src="{{asset('images')}}/{{$data->image3}}" style="width: 550px;margin: 0 auto;">
                        </div>
                         @endif
                        @if($data->image2!=NULL)
                        <div style="text-align: center">
                            <img id="image1" src="{{asset('images')}}/{{$data->image4}}" style="width: 550px;margin: 0 auto;">
                        </div>
                        @endif
                        @if($data->image2!=NULL)
                        <div style="text-align: center">
                            <img id="image1" src="{{asset('images')}}/{{$data->image5}}" style="width: 550px;margin: 0 auto;">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-5">
                    <h2 style="font-family: Moon">Deskripsi</h2>
                    <p class="text-justify" style="font-size: 16px">
                    {{$data->deskripsi}}
                    <br>
                    <strong>Kategori</strong> : {{$data->jenis}}
                    <br>
                    <strong>Nomor Telpon</strong> : {{$data->no_telp}}<br>
                    <strong>Alamat</strong> : {{$data->alamat}}<br>
                    </p>
                    <div class="col-md-12">
                        <a href="{{route('booking',$data->id)}}" class="btn btn-success" style="width: 100%">Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>
    <script src="{{asset('assets/frontend/js/isotope/jquery.isotope.min.js')}}" id="script-resource-5"></script>
    <script src="{{asset('js/slick.js')}}" id="script-resource-11"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.list-slider').slick({
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
          });
        });
    </script>
@endsection