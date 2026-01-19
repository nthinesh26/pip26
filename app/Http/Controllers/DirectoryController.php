<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{

    public function dictSorting(){
        
        $tag = request()->tag;
        $type = request()->type;
        
        
        if($tag == 'az')
            $order = 'ASC';
        elseif($tag == 'za')
            $order = 'DESC';
        
        if($type == 'all')
            $types = ['local', 'oem', 'royal', 'institute'];
        else
            $types = [$type];

        return view('portal.dict-sort-res')->with([
            'order' => $order,
            'types' => $types,
        ]);
    }

    public function index(){
        if(!$message = session('message'))
            $message = '';
            return view('portal.directory')->with([
               'message' => $message,
                'title' => 'Directory',
                'local_flash' => 0,
                'message' => $message,
                'user' => auth()->user(),
                'profile' => auth()->user()->profile(),
        ]);
    }

    public function filterByCtg($type){
        if(!$message = session('message'))
            $message = '';
            
        session()->flash('category', $type);
            return view('portal.directory')->with([
               'message' => $message,
                'title' => 'Directory',
                'local_flash' => 0,
                'message' => $message,
                'user' => auth()->user(),
                'type' => [$type],
                'profile' => auth()->user()->profile(),
        ]);
    }
}