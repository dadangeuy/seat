@extends('layouts.frontend_master')
@section('title','Seat | Service')
@section('additional_css')
    <!-- insert your additional css here -->
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
                <div class="col-sm-5">
                    <div class="btn-group alt-select-field" id="category-filter"> <button type="button" class="btn btn-label" data-toggle="dropdown">Kategori</button> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button>
                        <ul class="dropdown-menu" role="menu">
                            <li> <a href="#" data-filter="restoran">Restoran</a> </li>
                            <li> <a href="#" data-filter="kafe">Kafe</a> </li>
                        </ul>
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
    <section class="portfolio-container">
        <div class="container">
            @if($BiodataRestoran->count())
            <div class="row" id="portfolio-items">
                @foreach($BiodataRestoran as $BiodataRestorans)
                    @if($BiodataRestorans->jenis == 'restoran')
                        <div class="item col-sm-4 col-xs-6 filter-restoran">
                            <div class="portfolio-item">
                                <a href="{{route('single_restoran',$BiodataRestorans->id)}}" class="image"> <img src="{{asset('images')}}/{{$BiodataRestorans->image1}}" class="img-rounded" style="height: 221px; width: 310px; overflow: hidden;" /> <span class="hover-zoom"></span> </a>
                                <h4> <a href="#" class="name">{{$BiodataRestorans->user->name}}</a> </h4>
                                <div class="categories"> <a>Restoran</a> </div>
                            </div>
                        </div>
                    @else
                        <div class="item col-sm-4 col-xs-6 filter-kafe">
                            <div class="portfolio-item">
                                <a href="{{route('single_restoran',$BiodataRestorans->id)}}" class="image"> <img src="{{asset('images')}}/{{$BiodataRestorans->image1}}" class="img-rounded" style="height: 221px; width: 310px; overflow: hidden;"/> <span class="hover-zoom"></span> </a>
                                <h4> <a href="#" class="name">{{$BiodataRestorans->user->name}}</a> </h4>
                                <div class="categories"> <a>Kafe</a> </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        {{$BiodataRestoran->links()}}
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="alert alert-info">
                        Tidak Ada Restoran / Cafe Ditemukan
                    </div>
                </div> 
            </div>
            @endif
        </div>
    </section>

@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>
    <script src="{{asset('assets/frontend/js/isotope/jquery.isotope.min.js')}}" id="script-resource-5"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $portfolio_items = $("#portfolio-items"),
                $category_filter = $("#category-filter");
            $portfolio_items.isotope({
                itemSelector: '.item',
                columnWidth: 1 / 4
            });
            $category_filter.on('change', function(ev, o) {
                var filter = o.el.data('filter');
                $portfolio_items.isotope({
                    filter: o.isDefault ? '.item' : '.filter-' + filter
                });
            });
            $(window).on('neon.resize', function() {
                $portfolio_items.isotope('reLayout');
            });
            $portfolio_items.isotope('reLayout');
        });
    </script>
@endsection