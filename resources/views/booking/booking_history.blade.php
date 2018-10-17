@extends('layouts.frontend_master')
@section('title','Seat | History Booking')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')    
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1 style="font-family: Moon">History Booking</h1>
                    <ol class="breadcrumb bc-3">
                        <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                        <li class="active"> <strong>History Booking</strong> </li>
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
                            <div class="panel-title">History Booking</div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12">
                                <table class="table table-primary">
                                    <thead>
                                        <th>Nama Restoran</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Berakhir</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Status</th>
                                        <th>Batalkan</th>
                                    </thead>
                                    <tbody>
                                        @if($data->count())
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>{{$datas->biodataRestoran->user->name}}</td>
                                            <td>{{$datas->tanggal}}</td>
                                            <td>{{$datas->jam_mulai}}</td>
                                            <td>{{$datas->jam_berakhir}}</td>
                                            <td>{{$datas->kode_pembayaran}}</td>
                                            <td>
                                                @if($datas->status=='wait')
                                                    <a class="btn btn-default">Terpesan</a>
                                                @elseif($datas->status=='progress')
                                                     <a class="btn btn-primary">Sedang berjalan</a>
                                                @elseif($datas->status=='fail')
                                                    <a class="btn btn-warning">Gagal</a>
                                                @elseif($datas->status=='success')
                                                    <a class="btn btn-success">Berhasil</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($datas->status=='wait')
                                                <a href="#" onclick="hapusData('{{route('booking_batal',$datas->id)}}')" class="btn btn-danger"> <i class="entypo-cancel"></i> Batalkan Pesanan
                                                @else
                                                    <a class="btn btn-default">Done</a>
                                                @endif
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3" style="text-align: center;">Data History kosong</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                {{$data->links()}}
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
     <script type="text/javascript">
        function hapusData(route){
            swal({
                title: "Apa anda yakin membatalkan pesanan ini?",
                text: "Pesanan yang dibatalkan tidak bisa dikembalikan lagi!",
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
@endsection