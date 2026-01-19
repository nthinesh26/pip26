<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    protected $guarded = [];

    public static function addTranslation(){
        return Translator::updateOrCreate([
            'root' => request()->item_name,
            'tranlated' => request()->translation,
        ], [
            'root' => request()->item_name,
            'tranlated' => request()->translation,
            'flag' => 'A'
        ]);
    }
}