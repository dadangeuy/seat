@extends('layouts.master')
@section('title','Seat | Biodata Restoran')
@section('additional_css')
    <style type="text/css">
        .slick-prev:before, .slick-next:before {
            color: black;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/neon.css')}}" id="style-resource-3">
@endsection
@section('content')
    <h2>Biodata Restoran</h2><br>
    <div class="row">
    @include('layouts.flash_msg')
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">Biodata</div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{route('biodata_restoran_edit')}}" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-6 col-xs-12"> 
                        <div class="col-sm-12 col-xs-12">
                            <div class="alert alert-info">
                                Anda Diwajibkan Untuk Mengisi Biodata sebelum memasukkan gambar denah serta daftar tempat duduk pada Kafe / Restoran Anda
                            </div>
                        </div>        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Tempat</label>
                            <div class="col-md-8">
                                <input id="nama" type="text" class="form-control" value="{{Auth::user()->name}}" name="name" required>
                            </div>
                        </div>
                        @if($biodata!=NULL&&$biodata->count())
                        <div class="form-group">
                            <label for="notelp" class="col-md-4 control-label">Jenis Tempat</label>
                            <div class="col-md-8">
                                <select class="form-control" name="jenis" required>
                                    @if( $biodata->jenis =="kafe")
                                        <option value="kafe" selected="selected">Kafe</option>
                                        <option value="restoran">Restoran</option>
                                    @else
                                        <option value="kafe">Kafe</option>
                                        <option value="restoran" selected="selected">Restoran</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi Tempat</label>
                            <div class="col-md-8">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{$biodata->deskripsi}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat Tempat</label>
                            <div class="col-md-8">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{$biodata->alamat}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="col-md-4 control-label">No telp Tempat</label>
                            <div class="col-md-8">
                                <input id="notelp" type="text" class="form-control" name="notelp" value="{{$biodata->no_telp}}" required>
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="notelp" class="col-md-4 control-label">Jenis Tempat</label>
                            <div class="col-md-8">
                                <select class="form-control" name="jenis">
                                    <option value="kafe">Kafe</option>
                                    <option value="restoran">Restoran</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi Tempat</label>
                            <div class="col-md-8">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat Tempat</label>
                            <div class="col-md-8">
                                <input id="alamat" type="text" class="form-control" name="alamat"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="col-md-4 control-label">No telp Tempat</label>
                            <div class="col-md-8">
                                <input id="notelp" type="text" class="form-control" name="notelp"  required>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-xs-12" >       
                        <div class="form-group">
                            <label for="image1" class="col-md-4 control-label">Gambar 1 (Logo)</strong></label>
                            <div class="col-md-8">
                                <input id="image1" type="file" class="form-control" name="image1"       >
                            </div>
                            <div class="col-md-12" style="text-align: right">
                            @if($biodata!=NULL&&$biodata->image1)
                                Gambar Sekarang : <a href="{{asset('images')}}/{{$biodata->image1}}" id="denah_lihat" target="_blank">{{$biodata->image1}}</a>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image2" class="col-md-4 control-label">Gambar 2</label>
                            <div class="col-md-8">
                                <input id="image2" type="file" class="form-control" name="image2"       >
                            </div>
                            <div class="col-md-12" style="text-align: right">
                            @if($biodata!=NULL&&$biodata->image2)
                                Gambar Sekarang : <a href="{{asset('images')}}/{{$biodata->image2}}" id="denah_lihat" target="_blank">{{$biodata->image2}}</a>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image3" class="col-md-4 control-label">Gambar 3</label>
                            <div class="col-md-8">
                                <input id="image3" type="file" class="form-control" name="image3"       >
                            </div>
                            <div class="col-md-12" style="text-align: right">
                            @if($biodata!=NULL&&$biodata->image3)
                                Gambar Sekarang : <a href="{{asset('images')}}/{{$biodata->image3}}" id="denah_lihat" target="_blank">{{$biodata->image3}}</a>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image4" class="col-md-4 control-label">Gambar 4</label>
                            <div class="col-md-8">
                                <input id="image4" type="file" class="form-control" name="image4"       >
                            </div>
                            <div class="col-md-12" style="text-align: right">
                            @if($biodata!=NULL&&$biodata->image4)
                                Gambar Sekarang : <a href="{{asset('images')}}/{{$biodata->image4}}" id="denah_lihat" target="_blank">{{$biodata->image4}}</a>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image5" class="col-md-4 control-label">Gambar 5</label>
                            <div class="col-md-8">
                                <input id="image5" type="file" class="form-control" name="image5"       >
                            </div>
                            <div class="col-md-12" style="text-align: right">
                            @if($biodata!=NULL&&$biodata->image5)
                                Gambar Sekarang : <a href="{{asset('images')}}/{{$biodata->image5}}" id="denah_lihat" target="_blank">{{$biodata->image5}}</a>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Edit Biodata</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        </div>
    </div><br/>
@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>
    <script src="{{asset('assets/frontend/js/neon-custom.js')}}" id="script-resource-6"></script>
@endsection