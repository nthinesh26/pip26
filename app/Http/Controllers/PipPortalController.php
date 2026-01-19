<?php

namespace App\Http\Controllers;


use App\Models\Director;
use App\Models\ICP;
use App\WebTool;
use Illuminate\Http\Request;

class PipPortalController extends Controller
{

    public function removeContract(){
       
        $icp = ICP::find(WebTool::dec(request()->i)) ?? null;
        if($icp){
            $del = $icp->update([
                'status' => 'del',
            ]);
            if($del)
                echo "<script>Swal.fire({title: 'The contract has been removed Successfully', text: 'Please check the list', icon: 'success'});</script>";
            
            return view('pages.local-company.p3-sets.icp-provider-list')->with([
                'company_id' => $icp->company_id,
                'ctg' => $icp->ctg
            ]);
        }
    }

    public function icpRecp(){
        //reception
        $icp = ICP::addICP(auth()->user()->type, auth()->user()->profile()->id, 'Recipient');
        if($icp)
            session()->flash('message', "<script>Swal.fire({title: 'Penyedia ICP berjaya ditambah.', text: 'Sila semak senarai untuk pengesahan.', icon: 'success'});</script>");
        else
            session()->flash('message', "<script>Swal.fire({title: 'Something went wrong', text: 'Please re-try', icon: 'error'});</script>");
        echo '<script>window.location.reload();</script>';
        // return view('pages.local-company.p3-sets.icp-recipient')->with([
        //     'company_id' => auth()->user()->profile()->id,
        //     'ctg' => 'Recipient',
        // ]);

    }

    public function icpPost(){
        //provider
        $icp = ICP::addICP(auth()->user()->type, auth()->user()->profile()->id, 'Provider');
        if($icp)
            echo "<script>Swal.fire({title: 'ICP Provider Added', text: 'Please check the list', icon: 'success'});</script>";
        else
            echo "<script>Swal.fire({title: 'Something went wrong', text: 'Please re-try', icon: 'error'});</script>";

        return view('pages.local-company.p3-sets.icp-provider-list')->with([
            'company_id' => auth()->user()->profile()->id,
            'ctg' => 'Provider',
        ]);

    }
    
    public function updateOfficer(){
        $update = auth()->user()->profile()->updateOfficer();
        if($update)
            session()->flash('message', "<script>Swal.fire({title: 'Detail have been updated Successfully', text: 'Please check and proceed', icon: 'success'});</script>");
        else
            session()->flash('message', "<script>Swal.fire({title: 'Something went wrong', text: 'Please check or Contact Admin', icon: 'error'});</script>");

        return redirect('/profile/application/fill/' . WebTool::enc('3'));
    }

    public function removeDirs(){
        $dir = Director::find(WebTool::dec(request()->r)) ?? null;
        if($dir){
            $del = $dir->delete();
        }
        session()->message('message', "<script>Swal.fire({title: 'Rekod berjaya dipadam.', text: '', icon: 'success'});</script>");
        echo '<script>window.location.reload();</script>';
        // return view('pages.local-company.sub.p2-dir-list')->with([
        //     'company_id' => auth()->user()->profile()->id,
        //     'user' => auth()->user(),
        // ]);
    }

    public function postDirectors(){
        $company_id = auth()->user()->profile()->id;
        $postDir = Director::createDirector($company_id);
        if($postDir)
            session()->flash('message', "<script>Swal.fire({title: 'Maklumat pengarah berjaya disimpan', text: 'Sila semak senarai untuk pengesahan.', icon: 'success'});</script>");
        else
            session()->flash('message', "<script>Swal.fire({title: 'Something went wrong', text: 'Please re-check', icon: 'warning'});</script>");
        echo '<script>window.location.reload();</script>';
        // return view('pages.local-company.sub.p2-dir-list')->with([
        //     'company_id' => $company_id,
        //     'user' => auth()->user(),
        // ]);
    }
}
