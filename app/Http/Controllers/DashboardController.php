<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BiodataUser;
use App\BiodataRestoran;
use App\Booking;
use App\User;
class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	if (Auth::user()->hasRole('restoran')){
            $biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
            $wait = Booking::where('biodatarestoran_id',$biodata->id)->where('status','wait');
            $success = Booking::where('biodatarestoran_id',$biodata->id)->where('status','success');
            $fail = Booking::where('biodatarestoran_id',$biodata->id)->where('status','fail');

           	return view('dashboard.index',compact('wait','success','fail','biodata'));
        }
        else if(Auth::user()->hasRole('user')){
        	$biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
        	if($biodata==NULL){
        		 return redirect(route('biodata_user_index'))->with('success', trans('Silahkan Isi Biodata Untuk Melanjutkan Transaksi'));
        	}
        	else{
        		 return redirect(route('home'));
        	}
        }
        else if(Auth::user()->hasRole('admin')){
            $restoran = BiodataRestoran::all();
            $user = BiodataUser::all();

            return view('admin.dashboard',compact('restoran','user'));
        }
        else return 404;
    }
}
