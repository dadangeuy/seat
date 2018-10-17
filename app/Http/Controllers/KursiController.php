<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BiodataRestoran;
use App\Kursi;
use Response;

class KursiController extends Controller
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
        $kursi = kursi::where('restoran_id',$biodata->id)->paginate(10);
    	return view('kursi.index',compact('kursi','biodata'));
    	
    }
    public function denah_edit(Request $request)
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data_biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
    	$destinationPath = public_path('images');
    	$image=$request->file('image');

    	if($data_biodata->denah!=NULL){
    		unlink($destinationPath.'\\'.$data_biodata->denah);
    	}
    	$data_biodata->denah = time().'.'.$image->getClientOriginalExtension();
    	$success = $data_biodata->save();
    	$image->move($destinationPath, $data_biodata['denah']);

    	if ($success){
            $data_biodata->lengkap = 0;
            $data_biodata->verified = 0;
            $data_biodata->save();
            return redirect(route('kursi_index'))->with('success', trans('Denah Berhasil Dirubah'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));


    }
    public function kursi_tambah(Request $request)
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$restoran = BiodataRestoran::where('user_id',Auth::user()->id)->first();

    	$data_kursi = [
    		'restoran_id' => $restoran->id,
    		'name' => $request->name,
    		'kapasitas' => $request->kapasitas,
    		];
    	$success = Kursi::create($data_kursi);

    	if ($success){
            $restoran->lengkap = 0;
            $restoran->verified = 0;
            $restoran->save();
            return redirect(route('kursi_index'))->with('success', trans('Data Tempat Duduk Baru Berhasil Dibuat'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }
    public function kursi_hapus($id)
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $restoran = BiodataRestoran::where('user_id',Auth::user()->id)->first();

    	$data = Kursi::find($id);
    	$data->delete();
        if ($data){
            $restoran->lengkap = 0;
            $restoran->verified = 0;
            $restoran->save();
            return redirect(route('kursi_index'))->with('success', trans('Data Kursi Berhasil Dihapus'));
        }
        return back()->with('error', trans('Data Kursi Gagal Dihapus. Silahkan Coba Lagi'));
    }
    public function kursi_find($id)
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data = Kursi::find($id);
    	return Response::json($data);
    }
    public function kursi_edit(Request $request)
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$data = Kursi::find($request->id_edit);
        $restoran = BiodataRestoran::where('user_id',Auth::user()->id)->first();

    	$data->name = $request->name_edit;
    	$data->kapasitas = $request->kapasitas_edit;

    	if ($data->save()){
            $restoran->lengkap = 0;
            $restoran->verified = 0;
            $restoran->save();
            return redirect(route('kursi_index'))->with('success', trans('Data Tempat Duduk Berhasil Diedit'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }
    public function kursi_verifikasi()
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $restoran = BiodataRestoran::where('user_id',Auth::user()->id)->first();
        $restoran->lengkap = 1;
    
        if ($restoran->save()){
            return redirect(route('kursi_index'))->with('success', trans('Data Tempat Duduk Berhasil Dikirim Untuk Dikirimilakukan Verifikasi'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }
}
