<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiodataUser;
use App\BiodataRestoran;
use App\Kursi;
use App\User; 	
use App\Booking;
use Response;
use Auth;

class BookingController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}
	public function index()
	{
		$BiodataRestoran = BiodataRestoran::where('verified',1)->orderBy('created_at', 'DESC')->paginate(9);
		return view('booking.index',compact('BiodataRestoran'));
	}
	public function search_restoran(Request $request)
	{
		$user = User::select('id')->where('name','like','%'.$request->name.'%')->get();	
		$BiodataRestoran = BiodataRestoran::where('verified',1)->whereIn('user_id',$user)->orderBy('created_at', 'DESC')->paginate(2);

		return view('booking.index',compact('BiodataRestoran'));
	}

	public function single_restoran($id)
	{
		$data = BiodataRestoran::find($id);
		return view('booking.single_restoran',compact('data'));
	}
	public function booking($id)
	{
		if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $biodata = BiodataRestoran::find($id);
		$data = Kursi::where('restoran_id',$id)->get();
		return view('booking.form_booking',compact('biodata','data'));
	}
	public function booking_cari_kursi($restoranid,$tanggal,$dari,$hingga)
	{
		if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $booking = Booking::select('kursi_id')->where('restoran_id',$restoranid)->where('status','!=','fail')->where('tanggal',$tanggal)->where(function ($query) use($dari,$hingga) {
                $query->where('jam_mulai', '<', $hingga)
                      ->Where('jam_berakhir', '>', $dari);
            });
        $kursi = Kursi::where('restoran_id',$restoranid)->whereNotIn('id',$booking)->get();
		return Response::json($kursi);
	}
	public function booking_tambah(Request $request)
	{
		if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
        if($biodata->balance<25000){
        	return back()->with('error', trans('Saldo E-Wallet Anda Tidak Cukup. Minimal 25000 '));
        }

    	$booking = [
    		'biodatauser_id' => $biodata->id,
    		'biodatarestoran_id' => $request->biodatarestoran_id,
    		'kursi_id' => $request->tempat_duduk,
    		'tanggal' => $request->tanggal,
    		'jam_mulai' => $request->dari,
    		'jam_berakhir' => $request->hingga,
    		'kode_pembayaran' => str_random(5)
    		];
    	$success = Booking::create($booking);

    	if ($success){
    		$biodata->balance = $biodata->balance - 25000;
        	$biodata->save();
            return redirect(route('booking_history'))->with('success', trans('Booking Berhasil dilakukan. Silahkan simpan kode pembayaran anda dan tunjukkan saat datang ke tempat : <strong>'.$booking['kode_pembayaran'].'</strong>'	));
        }
        else return back()->with('error', trans('Booking Gagal'));
	}
	public function booking_history(Request $request)
	{
		if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
        $data = Booking::where('biodatauser_id',$biodata->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('booking.booking_history',compact('data','biodata'));
	}
	public function booking_batal($id)
	{
		if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $booking = Booking::find($id);
        $booking->status = 'fail';
        $biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
        if ($booking->save()){
    		$biodata->balance = $biodata->balance + 25000;
        	$biodata->save();
            return redirect(route('booking_history'))->with('success', trans('Booking Berhasil Dibatalkan'));
        }
        else return back()->with('error', trans('Booking Gagal'));
	}

}
