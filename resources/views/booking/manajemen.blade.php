@extends('layouts.master')
@section('title','Seat | Manajemen Tempat Duduk')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')
    <h2>Manajemen Tempat Duduk</h2><br>
    @include('layouts.flash_msg')
    <div class="row">
    <div class="col-md-12">
        <table class="table table-primary">
            <thead>
                <th>Nama User</th>
                <th>Tempat Duduk</th>
                <th>Tanggal Pesanan</th>
                <th>Jam Mulai</th>
                <th>Jam Berakhir</th>
                <th>Kode Pembayaran</th>
                <th>Status</th>
                <th>Batalkan</th>
            </thead>
            <tbody>
                @if($booking->count())
                @foreach($booking as $bookings)
                <tr>
                    <td>{{$bookings->biodataUser->user->name}}</td>
                    <td>{{$bookings->kursi->name}}</td>
                    <td>{{$bookings->tanggal}}</td>
                    <td>{{$bookings->jam_mulai}}</td>
                    <td>{{$bookings->jam_berakhir}}</td>
                    <td>
                        @if($bookings->status!='wait')
                            {{$bookings->kode_pembayaran}}
                        @else
                            <button class="btn btn-default" onclick="verifikasi('{{$bookings->id}}')"> <i class="entypo-pencil"></i> Verifikasi
                            </button>
                        @endif
                    </td>
                    <td>
                        @if($bookings->status=='wait')
                            <a class="btn btn-default">Terpesan</a>
                        @elseif($bookings->status=='progress')
                             <a class="btn btn-primary">Sedang berjalan</a>
                        @elseif($bookings->status=='fail')
                            <a class="btn btn-warning">Gagal</a>
                        @elseif($bookings->status=='success')
                            <a class="btn btn-success">Berhasil</a>
                        @endif
                    </td>
                    <td>
                        @if($bookings->status=='wait')
                        <a href="#" onclick="hapusData('{{route('manajemen_booking_batal',$bookings->id)}}')" class="btn btn-danger"> <i class="entypo-cancel"></i> Batalkan Pesanan
                        </a>
                        @else
                        <a class="btn btn-default">Done</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" style="text-align: center;">Data Riwayat kosong</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    </div><br/>
    <div class="modal fade" id="verifikasi_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Verifikasi Booking</h4> </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form class="form-horizontal" action="{{route('manajemen_booking_verifikasi')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="id_verifikasi" type="hidden" class="form-control" name="id" required>
                                    <label for="kode" class="col-md-5 control-label">Masukkan Kode Pembayaran</label>
                                    <div class="col-md-7">
                                        <input id="kode" type="text" class="form-control" name="kode" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 button-submit">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Verifikasi Kode
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
        function hapusData(route){
            swal({
                title: "Apa anda yakin membatalkan Bookingan ini? ",
                text: "Bookingan boleh dibatalkan jika sudah lebih dari 1 jam dari waktu pemesanan. Bookingan yang dibatalkan tidak bisa dikembalikan lagi!",
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
        function verifikasi($id){
            $('#id_verifikasi').val($id);
            $('#verifikasi_modal').modal('show');
        }
    </script>
@endsection