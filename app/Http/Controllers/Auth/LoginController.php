<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\BiodataUser;
use App\BiodataRestoran;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'Anda harus memverfikasi akun anda. Silahkan cek email anda untuk melakukan verifikasi');
        }
        else if(Auth::user()->hasRole('restoran')){
            $biodata = BiodataRestoran::where('user_id',Auth::user()->id)->first();
            if($biodata==NULL){
                return redirect()->route('biodata_restoran_index')->with('success', 'Silahkan Isi Biodata Restoran Anda Terlebih Dahulu Untuk Mulai Mengatur Tempat Duduk');
            }
            else{
                return redirect()->intended($this->redirectPath());
            }

        }
        else if(Auth::user()->hasRole('user')){
            $biodata = BiodataUser::where('user_id',Auth::user()->id)->first();
            if($biodata==NULL){
                return redirect()->route('biodata_user_index')->with('success', 'Silahkan isi Biodata Anda untuk mulai memesan tempat');
            }
            else{
                return redirect()->intended($this->redirectPath());
            }

        }
        return redirect()->intended($this->redirectPath());
    }
}
