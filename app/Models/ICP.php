<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICP extends Model
{
    protected $guarded = [];

    public static function addICP($type, $company_id, $ctg = 'Provider', $props = 'N.A'){
        return ICP::updateOrCreate([
            'type' => $type, // local, oem etc.
            'company_id' => $company_id, // auth()->profile()->
            'ctg' => $ctg, // Provider or Recipient
            'name' => request()->name,
            'contract' => request()->contract,
        ], [
            'type' => $type,
            'company_id' => $company_id,
            'ctg' => $ctg,
            'name' => request()->name,
            'contract' => request()->contract,
            'start_year' => request()->strat,
            'end_year' => request()->end,
            'props' => request()->props ?? $props,
            'status' => 'active',
        ]);
    }
}