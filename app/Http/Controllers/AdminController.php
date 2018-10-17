<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiodataRestoran;
use App\BiodataUser;
use App\TopUp;
use App\User;
use Auth;
class AdminController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
    public function verifikasi_restoran()
    {
        if (Auth::user()->hasRole('admin')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data = BiodataRestoran::all();

        return view('admin.verifikasi_restoran',compact('data'));
        
    }
    public function verifikasi_restoran_do($id)
    {
        if (Auth::user()->hasRole('admin')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data = BiodataRestoran::find($id);
    	$data->verified = 1;
    	if ($data->save()){
            return redirect(route('admin_verifikasi_restoran'))->with('success', trans('Verifikasi Restoran Berhasil Dilakukan'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
        
    }
    public function verifikasi_topup()
    {
        if (Auth::user()->hasRole('admin')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data = Topup::all();

        return view('admin.verifikasi_topup',compact('data'));
        
    }

    public function verifikasi_topup_do(Request $request)
    {
        if (Auth::user()->hasRole('admin')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $user = User::find($request->id);
    	$data = BiodataUser::where('user_id',$user->id)->first();
    	$data->balance = $data->balance+$request->nominal;
    	if ($data->save()){
    		$topup = Topup::find($request->topup_id);
    		$topup->verified = 1;
    		$topup->save();
            return redirect(route('admin_verifikasi_topup'))->with('success', trans('Verifikasi Topup Berhasil Dilakukan'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
        
    }
}
