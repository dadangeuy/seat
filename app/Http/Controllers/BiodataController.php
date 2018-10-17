<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\BiodataUser;
use App\BiodataRestoran;

class BiodataController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}
    public function user_index()
    {
        if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$biodata = BiodataUser::where('user_id',Auth::user()->id)->first();

        return view('biodata.user_index',compact('biodata'));
        
    }
    public function user_edit(Request $request)
    {
        if (Auth::user()->hasRole('user')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $data_user = User::find(Auth::user()->id);
    	$data_biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
        
    	if(!$request->file('image')&&$data_biodata==NULL)
    	{
    		return back()->with('error', trans('Gagal edit biodata. Silahkan Masukan Foto'));	
    	}

    	$data_user->name = $request->name;
    	$data_user->save();

    	$destinationPath = public_path('images');
    	$image=$request->file('image');
    	
    	if($data_biodata!=NULL){
    		
    		$data_biodata->alamat = $request->alamat;
    		$data_biodata->no_telp = $request->notelp;
    		if($image){
    			unlink($destinationPath.'\\'.$data_biodata->image);
    			$data_biodata->image = time().'.'.$image->getClientOriginalExtension();
    		}
    		$success = $data_biodata->save();
    	}
    	else{
    		$data_biodata = [
    		'user_id' => Auth::user()->id,
    		'alamat' => $request->alamat,
    		'no_telp' => $request->notelp,
    		'image' => time().'.'.$image->getClientOriginalExtension(),
    		];
    		$success = BiodataUser::create($data_biodata);
    	}
    	if($image)$image->move($destinationPath, $data_biodata['image']);
        if ($success){
            return redirect(route('biodata_user_index'))->with('success', trans('Biodata Berhasil Dirubah'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }
    public function restoran_index()
    {
        if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
    	$biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
        return view('biodata.restoran_index',compact('biodata'));
    }
    public function restoran_edit(Request $request)
    {
       if (Auth::user()->hasRole('restoran')==NULL){
            return redirect(route('dashboard'))->with('error', trans('Anda Tidak Punya otoritas untuk mengakses halaman ini'));
        }
        $data_user = User::find(Auth::user()->id);
        $data_biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();

        if($data_biodata==NULL&&!$request->file('image1'))
        {
            return back()->with('error', trans('Gagal edit biodata. Silahkan Masuk Gambar 1'));
        }

        $data_user->name = $request->name;
        $data_user->save();

        $destinationPath = public_path('images');
        $image1=$request->file('image1');
        $image2=$request->file('image2');
        $image3=$request->file('image3');
        $image4=$request->file('image4');
        $image5=$request->file('image5');
        
        if($data_biodata!=NULL){
            
            $data_biodata->deskripsi = $request->deskripsi;
            $data_biodata->alamat = $request->alamat;
            $data_biodata->no_telp = $request->notelp;
            $data_biodata->jenis = $request->jenis;
            if($image1){
                if($data_biodata->image1!=NULL)unlink($destinationPath.'\\'.$data_biodata->image1);
                $data_biodata->image1 = time().'.'.$image1->getClientOriginalExtension();
            }
            if($image2){
                if($data_biodata->image2!=NULL)unlink($destinationPath.'\\'.$data_biodata->image2);
                $data_biodata->image2 = time().'.'.$image2->getClientOriginalExtension();
            }
            if($image3){
                if($data_biodata->image3!=NULL)unlink($destinationPath.'\\'.$data_biodata->image3);
                $data_biodata->image3 = time().'.'.$image3->getClientOriginalExtension();
            }
            if($image4){
                if($data_biodata->image4!=NULL)unlink($destinationPath.'\\'.$data_biodata->image4);
                $data_biodata->image4 = time().'.'.$image4->getClientOriginalExtension();
            }
            if($image5){
                if($data_biodata->image5!=NULL)unlink($destinationPath.'\\'.$data_biodata->image5);
                $data_biodata->image5 = time().'.'.$image5->getClientOriginalExtension();
            }
           
            $success = $data_biodata->save();
        }
        else{
            $data_biodata = [
            'user_id' => Auth::user()->id,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'no_telp' => $request->notelp,
            'jenis' => $request->jenis,
            'image1' => '',
            'image2' => '',
            'image3' => '',
            'image4' => '',
            'image5' => '',
            ];
            if($image1){
                $data_biodata['image1'] = '1'.time().'.'.$image1->getClientOriginalExtension();
            }
            if($image2){
                $data_biodata['image2'] = '2'.time().'.'.$image2->getClientOriginalExtension();
            }
            if($image3){
                $data_biodata['image3'] = '3'.time().'.'.$image3->getClientOriginalExtension();
            }
            if($image4){
                $data_biodata['image4'] = '4'.time().'.'.$image4->getClientOriginalExtension();
            }
            if($image5){
                $data_biodata['image5'] = '5'.time().'.'.$image5->getClientOriginalExtension();
            }
            $success = BiodataRestoran::create($data_biodata);
        }

        if($image1)$image1->move($destinationPath, $data_biodata['image1']);
        if($image2)$image2->move($destinationPath, $data_biodata['image2']);
        if($image3)$image3->move($destinationPath, $data_biodata['image3']);
        if($image4)$image4->move($destinationPath, $data_biodata['image4']);
        if($image5)$image5->move($destinationPath, $data_biodata['image5']);

        if ($success){
            return redirect(route('biodata_restoran_index'))->with('success', trans('Biodata Berhasil Dirubah'));
        }
        return back()->with('error', trans('Data salah. Silahkan Coba Lagi'));
    }

}
