<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stok;
use App\Menu;
use App\Pembayaran;
use App\Antrian;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function service()
    {
        return view('service');
    }
    public function about_us()
    {
        return view('about_us');
    }
    public function blog()
    {
        return view('blog');
    }
    public function FAQ()
    {
        return view('faq');
    }
    
}
