<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $guarded = [];

    public static function createDirector($company_id){
        return Director::updateOrCreate([
            'local_company_id' => $company_id,
            'name' => request()->n,
            'proof_id' => request()->proof_id,
            ], [
            'local_company_id' => $company_id,
            'name' => request()->n,
            'proof_id' => request()->i,
            'citizen' => request()->z,
            'position' => request()->p,
            'shares' => request()->h,
            'status' => request()->s,
            'active' => 'active',
        ]);
    }
}