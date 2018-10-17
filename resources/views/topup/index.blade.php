@extends('layouts.frontend_master')
@section('title','Seat | Top Up')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')    
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1 style="font-family: Moon">Top Up E-Wallet</h1>
                    <ol class="breadcrumb bc-3">
                        <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                        <li class="active"> <strong>Top-Up</strong> </li>
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
                            <div class="panel-title">Top Up E wallet</div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{route('topup_tambah')}}" class="form-horizontal form-group-bordered" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-7 col-xs-12">
                                    <div class="form-group">
                                        <div class="alert alert-info">
                                            Anda dapat mentopup E-Wallet anda dengan cara mentransfer uang langsung ke Rekening BCA 3680077583 Atas nama Achmadaniar Anindya Rhosady.<br>
                                            Setelah mentransfer uang jangan lupa untuk cetak bukti dan upload bukti pendaftarannya di form di bawah ini
                                        </div>
                                    </div>         
                                    <div class="form-group">
                                        <label for="image1" class="col-md-4 control-label">Bukti Pembayaran</strong></label>
                                        <div class="col-md-8">
                                            <input id="image1" type="file" class="form-control" name="image"       >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Upload Bukti</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <div class="tile-stats tile-blue">
                                        <div class="icon"><i class="entypo entypo-doc-text-inv"></i></div>
                                        <div class="num">Rp. {{number_format($biodata->balance,2,",",".")}}</div>
                                        <h3>Saldo Anda Sekarang</h3>
                                    </div>
                                    <hr>
                                    <div class="col-sm-12 col-xs-12">
                                        <table class="table table-primary">
                                            <thead>
                                                <th>File Anda</th>
                                                <th>Status</th>
                                            </thead>
                                            <tbody>
                                                @if($data->count())
                                                @foreach($data as $datas)
                                                <tr>
                                                    <td>
                                                        <a href="{{asset('bukti')}}/{{$datas->bukti}}" target="_blank">{{$datas->bukti}}</a>
                                                    </td>
                                                    <td>
                                                        @if($datas->verified)
                                                            <a class="btn btn-success">Terverikasi</a>
                                                        @else
                                                            <a class="btn btn-primary">Belum Terverikasi</a>
                                                        @endif
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
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        {{$data->links()}}
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