<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
use Auth;
use App\BiodataUser;
class TopupController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
	public function index()
    {
        if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $biodata =  BiodataUser::where('user_id',Auth::user()->id)->first();
        $data = Topup::where('user_id',Auth::user()->id)->paginate(10);
    	return view('topup.index',compact('biodata','data'));
    	
    }
    public function tambah_topup(Request $request)
    {
        if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }

    	$destinationPath = public_path('bukti');
    	$image=$request->file('image');
    	
		$data = [
			'user_id' => Auth::user()->id,
			'bukti' => time().'.'.$image->getClientOriginalExtension(),
		];
		$success = Topup::create($data);

    	if($image)$image->move($destinationPath, $data['bukti']);
        if ($success){
            return redirect(route('topup_index'))->with('success', trans('Top Berhasil Dilakukan. Silahkan Tunggu Admin untuk memverifikasinya'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }
}
