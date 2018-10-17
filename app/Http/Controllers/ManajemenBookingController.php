<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BiodataRestoran;
use App\Kursi;
use App\Booking;
use Response;

class ManajemenBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first(); 
    	if($biodata==NULL){
             return redirect(route('biodata_restoran_index'))->with('error', trans('Silahkan Lengkapi Data Biodata Terlebih Dahulu '));
        }
        if(!$biodata->verified)
        {
        	return redirect(route('kursi_index'))->with('error', trans('Denah Anda Belum Terverifikasi Oleh Admin'));
        }
        $booking = Booking::where('biodatarestoran_id',$biodata->id)->orderBy('created_at', 'DESC')->paginate(10);
    	return view('booking.manajemen',compact('booking','biodata'));
    }
    public function verifikasi(Request $request)
    {
    	if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $data = Booking::find($request->id);
        $biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
        if($data->kode_pembayaran==$request->kode){
        	$data->status = 'success';
        	$data->save();
        	$biodata->balance = $biodata->balance + 25000;
        	$biodata->save();
        	return redirect(route('manajemen_booking_index'))->with('success', trans('Verifikasi Data Berhasil'));
        }
        else{
        	return redirect(route('manajemen_booking_index'))->with('error', trans('Kode Pembayaran Anda Salah'));	
        }
    }
    public function batal($id)
	{
		if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $booking = Booking::find($id);
        $booking->status = 'fail';
        $biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
        if ($booking->save()){
    		$biodata->balance = $biodata->balance + 25000;
        	$biodata->save();
            return redirect(route('manajemen_booking_index'))->with('success', trans('Booking Berhasil Dibatalkan'));
        }
        else return back()->with('error', trans('Booking Gagal'));
	}
    
}
