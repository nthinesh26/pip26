<?php

namespace App\Http\Controllers\Royal;

use App\Models\Royal;
use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class RoyalController extends Controller
{

    public function index(){
         if (!$message = session('message'))
            $message = '';

        if (!$local_flash = session('local_flash'))
            $local_flash = '0';
        
            return view('pages.royal.general')->with([
                'message' => $message,
                'local_flash' => $local_flash,
                'title' => 'PIP Registration',
        ]);
    }

    public function postRoyalGeneral(){
		$user = User::where('email', request()->account_email)->first() ?? null;
		if(!$user){
        $royal = Royal::addRoyal();
        // dd($royal);
        if($royal){
             \Mail::to($royal->user->email)
            ->send(new ConfirmEmail($royal->user->id));
            session()->flash('message', "<script>Swal.fire({title: 'Maklumat Agensi Kerajaan berjaya ditambah. Sila semak e-mel untuk mengaktifkan akaun.', text: '', icon: 'success'});</script>");
        }else{
            session()->flash('message', "<script>Swal.fire({title: 'Pendaftaran belum lengkap. Sila hantar semula.', text: '', icon: 'error'});</script>");
        }
		}else{
		session()->flash('message', "<script>Swal.fire({title: 'Alamat e-mel yang dimasukkan telah berdaftar dalam sistem.', text: '', icon: 'error'});</script>");
		}
        return redirect('/pip/registration/royal');
    }

    
}
