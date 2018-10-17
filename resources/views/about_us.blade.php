@extends('layouts.frontend_master')
@section('title','Seat | About Us')
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
                        <h1 style="font-family: Moon">About Us</h1>
                        <ol class="breadcrumb bc-3">
                            <li> <a href="{{route('home')}}"><i class="fa-home"></i>Home</a> </li>
                            <li class="active"> <strong>About Us</strong> </li>
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
                        Seiring dengan berkembangnya teknologi, setiap orang kini semakin dimudahkan dengan adanya layanan untuk melakukan pemesanan atau booking baik untuk transportasi, tempat tinggal, hingga tiket menonton acara hiburan. Di Indonesia, layanan berbasis website untuk melakukan pemesanan secara online kian marak dan berkembang pesat, tetapi belum ditemukan pada industri kuliner. Banyak masyarakat yang sering datang ke tempat makan baik restoran atau café untuk makan Bersama teman dan keluarga, mencari suasana baru, untuk berbincang bersama rekan, dan bahkan untuk meeting bersama rekan bisnis. Namun, tak jarang kita dihadapkan pada kondisi restaurant atau café yang penuh sesak dengan orang di jam atau season tertentu.<br><br>
                        <strong>SEAT</strong> hadir sebagai solusi dari permasalahan ini, dimana banyak dari kita yang merasa kecewa karena tidak mendapat tempat duduk pada restaurant favorit atau bahkan harus mencari tempat lain untuk memiliki quality time bersama teman dan keluarga, <br><br>
                        <strong>SEAT</strong> merupakan layanan berbasis web yang dapat digunakan sebagai media dalam melakukan pemesanan atau booking meja untuk restoran ataupun café yang dapat di akses secara mudah melalui genggaman, kapan saja, dimana saja.<br><br>
                        Dengan membawa 3 nilai, SEAT ingin menjadi layanan memudahkan pelanggan untuk mendapatkan tempat yang nyaman demi waktu yang berkualitas.<br><br>
                        <strong>CEPAT</strong><br>
                        Melayani dengan cepat, dan terus berkembang melalui pengalaman.<br><br>
                        <strong>MUDAH</strong><br>
                        Mudah diakses dimana saja, kapan saja.<br><br>
                        <strong>TERPERCAYA</strong><br>
                        Bertransaksi dengan aman, dan menjadi kepercayaan pelanggan.<br><br>
                        </p>
                        
                    </div>
                    
                </div>
            </div>
        </section>
@endsection
@section('additional_js')
    <!-- insert your additional js here -->
@endsection