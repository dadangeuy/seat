@extends('layouts.master')
@section('title','Seat | Manajemen Tempat Duduk')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')
    <h2>Manajemen Tempat Duduk</h2><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 pull-right">
            <ul class="list-inline links-list pull-right">
                <li> <a class="btn btn-success" href="#baru" data-toggle="modal"> <i class="entypo-plus left"></i>Tempat Duduk Baru </a> </li>
            </ul>
        </div>
    </div><br/>
    @include('layouts.flash_msg')
    <div class="row">
    <div class="col-md-6">
        <table class="table table-bordered responsive">
            <thead>
                <tr>
                    <th>Nama Tempat Duduk</th>
                    <th>Jumlah Kapasitas</th>
                    <th>Harga</th>
                    <th style="width: 45%">Actions</th>
                </tr>
            </thead>
            <tbody>                
                @if($kursi->count())
                @foreach($kursi as $kursis)
                <tr>
                    <td>{{$kursis->name}}</td>
                    <td>{{$kursis->kapasitas}} orang</td>
                    <td>Rp. {{$kursis->harga}}</td>
                    <td>
                        <button class="btn btn-default btn-sm btn-icon icon-left edit-modal" value="{{route('kursi_find',$kursis->id)}}" > <i class="entypo-pencil"></i> Edit
                        </button>
                        <a href="#" onclick="hapusData('{{route('kursi_hapus',$kursis->id)}}')" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-cancel"></i> Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" style="text-align: center;">Data Tempat Duduk Kosong</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$kursi->links()}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">Verifikasi Data</div>
            </div>
            
            <div class="panel-body" >
                <div class="col-sm-12 col-xs-12">
                    @if(!$biodata->verified)
                        @if(!$biodata->lengkap)
                        <div class="alert alert-warning">
                            Data Tempat Duduk Anda belum terverifikasi oleh admin. Silahkan lengkapi data tempat duduk anda kemudian klik tombol verfikasi di bawah ini 
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{route('kursi_verifikasi')}}" style="width: 100%">Verifikasi Data Tempat Duduk</a>
                        </div>
                        @else
                        <div class="alert alert-info">
                            Data Tempat Duduk Anda sedang diverifikasi oleh Admin. Jika anda mengganti data anda sekarang, maka anda perlu untuk melakukan verifikasi ulang. 
                        </div>
                        @endif
                    @else
                        <div class="alert alert-success">
                            Data Tempat Duduk Anda telah diverfikasi oleh admin. Jika anda mengganti data anda sekarang, maka anda perlu untuk melakukan verifikasi ulang. 
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">Denah Restoran</div>
            </div>
            <div class="panel-body" style="text-align: center;">
                <form method="POST" action="{{route('kursi_denah_edit')}}" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                    {{ csrf_field() }}                
                    @if($biodata!=NULL&&$biodata->denah)
                    <div id="gambarku">
                        <img src="{{asset('/images')}}/{{$biodata->denah}}" width="100%" style="max-height: 400px;margin-bottom: 5px">
                        <a href="#" onclick="gantigambar()" class="btn btn-orange">Ganti Denah</a>
                    </div>
                    <div id="fileinput" class="fileinput fileinput-new" data-provides="fileinput" style="display: none">
                    @else
                    <div id="fileinput" class="fileinput fileinput-new" data-provides="fileinput" >
                    @endif
                        <div class="fileinput-new thumbnail" style="width: 400px; height: 400   px;" data-trigger="fileinput"> <img src="http://placehold.it/400x400   " alt="..."> </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 400px"></div>
                        <div> <span class="btn btn-white btn-file"> <span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> <input type="file" name="image" accept="image/*" required> </span> <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-green">Ganti Denah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div><br/>

    <div class="modal fade" id="baru">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tempat Duduk Baru</h4> </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form class="form-horizontal" action="{{route('kursi_tambah')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-md-5 control-label">Nama Tempat Duduk</label>
                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kapasitas" class="col-md-5 control-label">Kapasitas</label>
                                    <div class="col-md-7">
                                        <input id="kapasitas" type="number" class="form-control" name="kapasitas" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="col-md-5 control-label">Harga</label>
                                    <div class="col-md-7">
                                        <input id="harga" type="number" class="form-control" name="harga" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 button-submit">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Tambah Tempat Duduk Baru
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Tempat Duduk</h4> </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form class="form-horizontal" action="{{route('kursi_edit')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input id="id_edit" type="hidden" class="form-control" name="id_edit" required>
                                <div class="form-group">
                                    <label for="name_edit" class="col-md-5 control-label">Nama Tempat Duduk</label>
                                    <div class="col-md-7">
                                        <input id="name_edit" type="text" class="form-control" name="name_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kapasitas_edit" class="col-md-5 control-label">Kapasitas</label>
                                    <div class="col-md-7">
                                        <input id="kapasitas_edit" type="number" class="form-control" name="kapasitas_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_edit" class="col-md-5 control-label">Harga</label>
                                    <div class="col-md-7">
                                        <input id="harga_edit" type="number" class="form-control" name="harga_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 button-submit">
                                        <button type="submit" class="btn btn-warning pull-right">
                                            Edit Tempat Duduk
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        function hapusData(route){
            swal({
                title: "Apa anda yakin menghapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location.href = route;
                } 
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.edit-modal').click(function(){
                var url = $(this).val();
                $.get(url, function (data) {
                    //success data
                    console.log(data);
                    $('#id_edit').val(data.id);
                    $('#name_edit').val(data.name);
                    $('#kapasitas_edit').val(data.kapasitas);
                    $('#harga_edit').val(data.harga);
                    $('#edit').modal('show');
                }) 
            });
        });
    </script>
@endsection