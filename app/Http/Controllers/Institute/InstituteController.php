<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use App\Models\Institute;
use App\Models\User;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index(){
      if (!$message = session('message'))
            $message = '';

        if (!$local_flash = session('local_flash'))
            $local_flash = '0';

        return view('pages.institute.general')->with([
            'message' => $message,
            'title' => '',
            'local_flash' => $local_flash,
        ]);
    }

    public function postInstitute(){
         $ins = Institute::createInstitute();
        dd($ins);
        try {
            $user = User::where('email', request()->account_email)->first() ?? null;
            if(!$user){

                if($ins){
                    \Mail::to($ins->user->email)
                    ->send(new ConfirmEmail($ins->user->id));
                    session()->flash('message', "<script>Swal.fire({title: 'Maklumat  Institusi Penyelidikan & Akademia Berjaya dihantar. Sila semak e-mel untuk mengaktifkan akaun.', text: '', icon: 'success'});</script>");
                }else{
                    session()->flash('message', "<script>Swal.fire({title: 'Pendaftaran belum lengkap. Sila hantar semula.', text: '', icon: 'error'});</script>");
                }
            }
            else{
                session()->flash('message', "<script>Swal.fire({title: 'Alamat e-mel yang dimasukkan telah berdaftar dalam sistem.', text: '', icon: 'error'});</script>");
            }
        }
        catch (\Exception $e) {
            session()->flash('message', "<script>Swal.fire({title: 'Pendaftaran belum lengkap. Sila hantar semula.', text: '', icon: 'error'});</script>");
        }
        return redirect('/pip/registration/institute');
    }
}
