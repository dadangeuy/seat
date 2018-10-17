@extends('layouts.frontend_master')
@section('title','Seat | FAQ')
@section('additional_css')
    <style type="text/css">
        .site-nav{
            float: center
        }
    </style>
@endsection
@section('content')
        <!-- TS14566675531124 -->
        <section class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h1 style="font-family: Moon">FAQ</h1>
                        <ol class="breadcrumb bc-3">
                            <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                            <li class="active"> <strong>FAQ</strong> </li>
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
        <section class="portfolio-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;margin-bottom: 20px">
                        <p style="font-size: 18px; text-align: justify">
                        <strong>Bagaimana Cara Melakukan Pemesanan SEAT?</strong><br>
                        Anda dapat menggunakan layanan SEAT untuk memesan meja pada restoran pilihan anda. Temukan berbagai macam pilihan restoran yang berbeda di menu yang tersedia. Ketika Anda memesan layanan SEAT, anda tidak bisa memesan meja dari restoran di luar kota.<br><br>
                        <strong>Bagaimana Perhitungan Tarif SEAT?</strong><br>
                        Anda dapat menggunakan layanan SEAT dengan dikenakan biaya pada harga yang tertera di menu pilihan. Harga dapat berubah tergantung sesuai dengan batas waktu pemesanan, dan dikenakan biaya tambahan apabila anda melebihi batas waktu pesanan.<br> 
                        *Tarif dapat berubah sewaktu-waktu tanpa pemberitahuan<br><br>
                        <strong>Di Kota Manakah Layanan SEAT Tersedia?</strong><br>
                        Saat ini SEAT hanya melayani kota Surabaya, Jawa Timur.<br><br>
                        <strong>Apa itu E-Wallet SEAT?</strong><br>
                        E-Wallet SEAT adalah dompet virtual yang bisa Anda gunakan untuk melakukan pembayaran semua transaksi dalam aplikasi SEAT. Anda dapat mengisi saldo E-Wallet SEAT Anda melalui transfer bank.<br><br>
                        <strong>Bagaimana Cara Menggunakan E-Wallet SEAT?</strong><br>
                        Berikut ini adalah cara yang paling mudah untuk menggunakan E-Wallet SEAT:<br>
                        1.  Pastikan saldo E-Wallet SEAT Anda mencukupi<br>
                        2.  Lakukan pengisian pada saldo E-Wallet SEAT Anda jika saldo tidak mencukupi<br>
                        3.  Pilih pembayaran menggunakan E-Wallet SEAT saat melakukan order pada aplikasi SEAT<br>

                        </p>
                        
                    </div>
                    
                </div>
            </div>
        </section>
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection