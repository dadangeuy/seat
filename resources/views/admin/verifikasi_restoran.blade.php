@extends('layouts.master')
@section('title','Seat | Verifikasi Restoran')
@section('additional_css')
    <!-- insert your additional css here -->
@endsection
@section('content')
    <h2>Verifikasi Restoran</h2><br>
    @include('layouts.flash_msg')
    <div class="row">
    <div class="col-md-12">
        <table class="table table-primary">
            <thead>
                <th>Nama Restoran</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Denah</th>
                <th>Verifikasi</th>
            </thead>
            <tbody>
                @if($data->count())
                @foreach($data as $datas)
                <tr>
                    <td>{{$datas->user->name}}</td>
                    <td>{{$datas->alamat}}</td>
                    <td>{{$datas->no_telp}}</td>
                    <td><a href="{{asset('images')}}/{{$datas->denah}}" target="_blank" class="btn btn-info"> View</a></td>
                    <td>
                        @if($datas->verified)
                            <a class="btn btn-success">Telah Terverifikasi</a>
                        @else
                            <a class="btn btn-warning" href="{{route('admin_verifikasi_restoran_do',$datas->id)}}">Verifikasi</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" style="text-align: center;">Data Restoran kosong</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
@endsection
@section('additional_js')
    <script src="{{asset('assets/js/fileinput.js')}}" id="script-resource-8"></script>

@endsection