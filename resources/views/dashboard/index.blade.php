@extends('layouts.master')
@section('title','Seat | Dashboard')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')
    <h2>Dashboard</h2><br>
    @include('layouts.flash_msg')
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-retweet"></i></div>
                <div class="num" data-start="0" data-end="{{$wait->count()}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
                <h3>Booking Ditunggu</h3>
            </div>
        </div>
        <div class="clear visible-xs"></div>
        <div class="col-sm-6 col-xs-12">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-check"></i></div>
                <div class="num" data-start="0" data-end="{{$success->count()}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
                <h3>Booking Berhasil</h3>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-cancel"></i></div>
                <div class="num" data-start="0" data-end="{{$fail->count()}}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
                <h3>Booking Gagal</h3>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-doc-text-inv"></i></div>
                <div class="num" data-start="0" data-end="{{$biodata->balance}}" data-postfix="" data-duration="1800" data-delay="2100">0</div>
                <h3>Saldo Anda</h3>
            </div>
        </div>
    </div><br/>
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection