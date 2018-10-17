@extends('layouts.frontend_master')
@section('title','Seat | Biodata User')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')    
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1 style="font-family: Moon">Biodata</h1>
                    <ol class="breadcrumb bc-3">
                        <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                        <li class="active"> <strong>Biodata</strong> </li>
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">Biodata</div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{route('biodata_user_edit')}}" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-7 col-xs-12">
                                    <div class="form-group">
                                        <div class="alert alert-info">
                                            Silahkan isi biodata anda dengan benar. Informasi yang ada dalam biodata ini akan anda gunakan dalam melakukan transaksi
                                        </div>
                                    </div>         
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Nama</label>
                                        <div class="col-md-8">
                                            <input id="nama" type="text" class="form-control" value="{{Auth::user()->name}}" name="name" required>
                                        </div>
                                    </div>
                                    @if($biodata!=NULL&&$biodata->count())
                                    <div class="form-group">
                                        <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{$biodata->alamat}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp" class="col-md-4 control-label">No telp</label>
                                        <div class="col-md-8">
                                            <input id="notelp" type="text" class="form-control" name="notelp" value="{{$biodata->no_telp}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Edit Biodata</button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <input id="alamat" type="text" class="form-control" name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelp" class="col-md-4 control-label">No telp</label>
                                        <div class="col-md-8">
                                            <input id="notelp" type="text" class="form-control" name="notelp" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Edit Biodata</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-sm-5 col-xs-12" style="text-align: center;">         
                                    <div class="form-group">
                                        @if($biodata!=NULL&&$biodata->image)
                                        <div id="gambarku">
                                            <img src="{{asset('/images')}}/{{$biodata->image}}" style="min-width:300px;max-width: 300px;margin-bottom: 5px">
                                            <a  onclick="gantigambar()" class="btn btn-orange">Ganti Gambar</a>
                                        </div>
                                        <div id="fileinput" class="fileinput fileinput-new" data-provides="fileinput" style="display: none">
                                        @else
                                        <div id="fileinput" class="fileinput fileinput-new" data-provides="fileinput" >
                                        @endif
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200   px;" data-trigger="fileinput"> <img src="http://placehold.it/200x200   " alt="..."> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200  px"></div>
                                            <div> <span class="btn btn-white btn-file"> <span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> <input type="file" name="image" accept="image/*"> </span> <a  class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>
    <script type="text/javascript">
        function gantigambar() {
            $('#gambarku').css({
                'display': 'none'
            });
            $('#fileinput').css({
                'display': 'inline-block'
            });
        }
    </script>
@endsection