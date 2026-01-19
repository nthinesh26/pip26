<?php

namespace App\Http\Controllers;

use App\WebTool;

use Illuminate\Http\Request;

class ManagePIPController extends Controller
{
    public function fetchLocalCom($id){
        $company = LocalCompany::find(WebTool::dec($id)) ?? null;
        if (!$message = session('message'))
            $message = '';
        
        if($company){
            if (!$local_flash = session('local_flash'))
                $local_flash = '0';
            return view('pages.general.registrartion')->with([
                'message' => $message,
                'local_flash' => $local_flash,
                'title' => 'PIP Registration',
                'company' => $company,
                'pipInject' => $company->fetchRecord(),
            ]);
        }
    }
}
