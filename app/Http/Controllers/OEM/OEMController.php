<?php

namespace App\Http\Controllers\OEM;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use App\Models\OEM;
use App\Models\User;
use Illuminate\Http\Request;

class OEMController extends Controller
{

    public function submitOEM()
    {
        try {
            $user = User::where('email', request()->account_email)->first() ?? null;
            if (!$user) {
                $oem = OEM::addOEM();

                if ($oem) {
                    \Mail::to($oem->user->email)
                        ->send(new ConfirmEmail($oem->user->id));
                    session()->flash('message', "<script>Swal.fire({title: 'Pendaftaran OEM berjaya dihantar. Sila semak e-mel untuk mengaktifkan akaun.', text: '', icon: 'success'});</script>");
                } else {
                    session()->flash('message', "<script>Swal.fire({title: 'Pendaftaran belum lengkap. Sila hantar semula.', text: '', icon: 'error'});</script>");
                }
            } else {
                session()->flash('message', "<script>Swal.fire({title: 'Alamat e-mel yang dimasukkan telah berdaftar dalam sistem.', text: '', icon: 'error'});</script>");
            }
        } catch (\Exception $ex) {
            session()->flash('message', "<script>Swal.fire({title: '".$ex->getMessage()."', text: 'Message from Server', icon: 'error'});</script>");
        }

        return redirect()->back();
    }

    public function index()
    {
        if (!$message = session('message'))
            $message = '';

        if (!$local_flash = session('local_flash'))
            $local_flash = '0';

        return view('pages.oem.general')->with([
            'message' => $message,
            'local_flash' => $local_flash,
            'title' => 'PIP Registration',
        ]);
    }
}
