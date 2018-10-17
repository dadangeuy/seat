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
    
    <!-- TS14566675531124 -->
    <section class="portfolio-item-details">
        <div class="container">
            <div class="row item-title">
                <div class="col-sm-9">
                    <h1 style="font-family: Moon"> <a href="#">Booking - {{$biodata->user->name}}</a> </h1>
                </div>
            </div>
            <div class="row">
                 @include('layouts.flash_msg')
                <div class="col-md-6">
                    <div class="panel panel-primary panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><strong>Form Booking Tempat</strong></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12" style="text-align: justify">
                                <div class="alert alert-info">
                                    Dalam booking tempat anda diharuskan memiliki saldo E-Wallet minimal 25 ribu sebagai biaya deposit.
                                    Jika saldo anda sudah cukup silahkan pilih tempat dengan menentukan tanggal dan jam terlebih dahulu
                                </div>
                            </div>
                            <form method="POST" action="{{route('booking_tambah')}}" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input id="biodatarestoran_id" type="hidden" class="form-control" name="biodatarestoran_id" value="{{$biodata->id}}">
                                <div class="form-group">
                                    <label for="tanggal" class="col-md-5 control-label">Tanggal</label>
                                    <div class="col-md-7">
                                        <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dari" class="col-md-5 control-label">Dari Jam</label>
                                    <div class="col-md-7">
                                        <input id="dari" type="time" class="form-control" name="dari" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hingga" class="col-md-5 control-label">Hingga Jam</label>
                                    <div class="col-md-7">
                                        <input id="hingga" type="time" class="form-control" name="hingga" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right;">
                                    <div class="col-md-12">
                                        <a class="btn btn-primary" onclick="cari_tempat('{{route('booking_temp',$biodata->id)}}')">Cari Tempat Duduk</a>
                                    </div>
                                </div>
                                <div id="list_kursi">
                                    <div class="form-group">
                                        <label for="booking_seat_name1" class="col-md-5 control-label">Tempat Duduk</label>
                                        <div class="col-md-7">
                                            <select id="tempat_duduk" class="form-control" name="tempat_duduk" required>
                                                <option value="" disabled selected><-- Pilih Waktu Dulu --></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-12" style="text-align: right;">
                                    <button type="submit" class="btn btn-success" style="width: 100%">Booking Tempat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12 col-xs-12">
                        <div class="panel panel-primary panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><strong>Denah {{$biodata->user->name}}</strong></div>
                            </div>
                            <div class="panel-body">
                                <div class="portfolio-item">
                                    <a href="{{asset('images')}}/{{$biodata->denah}}" class="image" target="_blank"> <img src="{{asset('images')}}/{{$biodata->denah}}" class="img-rounded" style="width: 450px;margin: 0 auto" /> <span class="hover-zoom"></span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>
    <script src="{{asset('assets/frontend/js/isotope/jquery.isotope.min.js')}}" id="script-resource-5"></script>
    <script type="text/javascript">
        function cari_tempat(url) {
            var tanggal = $('#tanggal').val();
            var dari = $('#dari').val();
            var hingga = $('#hingga').val();
            if(tanggal=='')alert('tanggal salah/kosong silahkan isi dengan benar');
            else if(dari=='')alert('Dari Jam salah/kosong silahkan isi dengan benar');
            else if(hingga=='')alert('Hingga Jam salah/kosong silahkan isi dengan benar');
            else{
                var print ="";
                $.get(url+'/'+tanggal+'/'+dari+'/'+hingga, function (data) {
                    if(data.length!=0){
                        for (var i=0;i< data.length;i++) { 
                            print = print + '<option value="'+data[i].id+'">'+data[i].name+' ('+data[i].kapasitas+' orang)</option>'
                        }
                    }
                    else {
                        print = '<option value="" disabled selected><-- Kosong --></option>'
                    }
                    $('#tempat_duduk').html(print);
                }); 
            }
        }
    </script>
@endsection