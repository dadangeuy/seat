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
                <div class="icon"><i class="entypo-user"></i></div>
                <div class="num" data-start="0" data-end="{{$user->count()}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
                <h3>Jumlah User Aktif</h3>
            </div>
        </div>
        <div class="clear visible-xs"></div>
        <div class="col-sm-6 col-xs-12">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-user"></i></div>
                <div class="num" data-start="0" data-end="{{$restoran->count()}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
                <h3>Jumlah Restoran Aktif</h3>
            </div>
        </div>
    </div><br/>
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection