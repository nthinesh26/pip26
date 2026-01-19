<?php

namespace App\Http\Controllers;

use App\Models\Translator;
use Illuminate\Http\Request;

class TranslateController extends Controller
{

    public function postTranslation(){
        $trans = Translator::addTranslation();
        if($trans)
            session()->flash('message', '<script>alert("Phrase has been added successfully");</script>');
        else
            session()->flash('message', '<script>alert("Something went wrong");</script>');

        return redirect('/portal/translator');
    }

    public function index(){
        if(!$message = session('message'))
            $message = '';
        
        return view('admin.translator.main')->with([
                'message' => $message,
                'title' => 'Translator Window Phrase / Text',
                'records' => Translator::orderBy('root', 'asc')->paginate(30),
        ]);
    }
    
    
}