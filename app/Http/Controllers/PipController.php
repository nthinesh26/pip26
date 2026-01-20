<?php

namespace App\Http\Controllers;


use App\WebTool;
use App\Models\User;
use App\Mail\ConfirmEmail;
use App\Models\LocalCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// local-com
class PipController extends Controller
{

    public function viewAsVisitor($user_id)
    {
        $user = User::find(WebTool::decode($user_id)) ?? null;
        if ($user) {
            return $this->index($user->id);
        }
    }

    public  function postLogo()
    {
        $post = WebTool::upload('logo', 'profile_image_upload');
        $update = auth()->user()->profile()->update([
            'logo' => $post,
        ]);
        if ($update)
            session()->flash('message', "<script>Swal.fire({title: 'Logo Posted succssfully', text: 'Check in the profile', icon: 'success'});</script>");
        return redirect()->back();
    }

    public function completeLocalReg()
    {
        $local = auth()->user()->profile()->completeReg();
        $update = auth()->user()->profile()->update([
            'status' => 'completed'
        ]);

        if ($local && $update) {
            session()->flash('message', "<script>Swal.fire({title: 'Maklumat Syarikat Tempatan berjaya dihantar. ', text: 'Maklumat Syarikat Tempatan berjaya dhantar. Sila semak e-mel untuk mengaktifkan akaun.', icon: 'success'});</script>");
            return redirect('/'); // need to redirect to final registration
        } else {
            session()->flash('message', "<script>Swal.fire({title: 'Ralat berlaku semasa pendaftaran. Sila semak maklumat dan hantar semula.', text: 'Pendaftaran belum lengkap. Sila hantar semula.', icon: 'warning'});</script>");
        }

        return redirect('/profile/application/fill/' . WebTool::enc('4'));
    }

    public function formWithPage($page)
    {
        $page = WebTool::dec($page);
        $profile = auth()->user()->profile();
        if ($page == 2)
            return $this->formFilling($page);

        return $this->formFilling($page);
    }

    public function updateApplication($type, $page)
    {
        $type = WebTool::dec($type);
        $page = WebTool::dec($page);
        $com = auth()->user()->profile();
        if ($type == 'local-com' && $page == 'p1') {
            $update = $com->updateCompany('p1');
            // dd([$update, request()->all()]);
            if ($update) {
                session()->flash('message', "<script>Swal.fire({title: 'Langkah 1 berjaya dikemas kini. Teruskan ke langkah seterusnya.', text: 'Maklumat berjaya direkodkan.', icon: 'success'});</script>");
                return redirect('/profile/application/fill/' . WebTool::enc('2'));
            }
        }
    }

    public function formFilling($page = 1, $data = [])
    {
        if (!$message = session('message'))
            $message = '';

        if (!$local_flash = session('local_flash'))
            $local_flash = '0';

        $type = auth()->user()->type;

        if ($type == 'local')
            $type = 'local-company';

        $view = 'pages.' . $type . '.p' . $page;

        return view($view)->with([
            'message' => $message,
            'title' => '',
            'profile' => auth()->user()->profile(),
            'local_flash' => $local_flash,
            'page' => $page,
            'pipInject' => auth()->user()->profile()->fetchRecord(),
        ])->with($data);
    }

    public function index($visitor = 0)
    {

        if (!$message = session('message'))
            $message = '';

        $tag = null;
        $visFlag = ownership($visitor);

        if ($visitor > 0) {
            $tag = User::find($visitor) ?? null;
            $profile = $tag->profile();
        } else {
            $profile = auth()->user()->profile();
        }


        return view('portal.' . auth()->user()->type)->with([
            'message' => $message,
            'user' => auth()->user(),
            'flag' => $visFlag,
            'tag' => $tag,
            'profile' => $profile,
            'title' => 'Welcome to Portal ' . auth()->user()->name,
        ]);
    }

    public function regLocalCom()
    {
        if (!$message = session('message'))
            $message = '';

        if (!$local_flash = session('local_flash'))
            $local_flash = '0';

        return view('pages.local-company.general')->with([
            'message' => $message,
            'local_flash' => $local_flash,
            'title' => 'PIP Registration',
        ]);
    }

    public function downloadFile($file, $name){
        $file = WebTool::dec($file);
        $name = WebTool::dec($name);
        return WebTool::downloadFile($file, $name);
    }

    public function submitLocalComDetails()
    {
        try {
            $user = User::where('email', request()->account_email)->first() ?? null;

            if (!$user) {
                $company = null;
                $company = LocalCompany::addCompany();

                if ($company) {
                    \Mail::to($company->user->email)
                ->send(new ConfirmEmail($company->user->id));
                    session()->flash('message', "<script>Swal.fire({icon: 'success',title: 'Maklumat Syarikat Tempatan berjaya dhantar. Sila semak e-mel untuk mengaktifkan akaun.',text: '',footer: ''})</script>");
                } else {
                    session()->flash('message', "<script>Swal.fire({icon: 'error',title: 'Pendaftaran belum lengkap. Sila hantar semula.',text: 'Ralat berlaku semasa pendaftaran. Sila semak maklumat dan hantar semula.',footer: ''})</script>");
                    session()->flash('local_flash', null);
                }
            } else {
                session()->flash('message', "<script>Swal.fire({icon: 'error',title: 'Emel yang dimasukkan sudah wujud dalam sistem.',text: '',footer: ''})</script>");
                session()->flash('local_flash', null);
            }
        } catch (\Exception $e) {
            session()->flash('message', "<script>Swal.fire({icon: 'error',title: '" . $e->getMessage() . "',text: 'Please contact admin',footer: ''})</script>");
        }
        return redirect('/pip/registration/local-company');
    }
}
