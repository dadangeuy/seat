@extends('layouts.master')
@section('title','Seat | Verifikasi Top Up')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')
    <h2>Verifikasi Top Up</h2><br>
    @include('layouts.flash_msg')
    <div class="row">
    <div class="col-md-12">
        <table class="table table-primary">
            <thead>
                <th>Nama User</th>
                <th>Bukti</th>
                <th>Verifikasi</th>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $datas)
                <tr>
                    <td>{{$datas->user->name}}</td>
                    <td><a href="{{asset('bukti')}}/{{$datas->bukti}}" target="_blank" class="btn btn-info"> View</a></td>
                    <td>
                        @if($datas->verified)
                            <a class="btn btn-success">Telah Terverifikasi</a>
                        @else
                            <a class="btn btn-warning" onclick="verifikasi({{$datas->id}},{{$datas->user_id}})">Verifikasi</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" style="text-align: center;">Data Top Up kosong</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="verifikasi_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Verifikasi Booking</h4> </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form class="form-horizontal" action="{{route('admin_verifikasi_topup_do')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="topup_id" type="hidden" class="form-control" name="topup_id" required>
                                    <input id="id_verifikasi" type="hidden" class="form-control" name="id" required>
                                    <label for="nominal" class="col-md-5 control-label">Masukkan Jumlah Pembayaran</label>
                                    <div class="col-md-7">
                                        <input id="nominal" type="number" class="form-control" name="nominal" required>
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
        function verifikasi($topup_id,$id){
            $('#id_verifikasi').val($id);
            $('#topup_id').val($topup_id);
            $('#verifikasi_modal').modal('show');
        }
    </script>
@endsection