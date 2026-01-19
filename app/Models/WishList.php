<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $guarded = [];

    public function local()
    {
        return $this->belongsTo(LocalCompany::class, 'company_id');
    }

    public function oem()
    {
        return $this->belongsTo(OEM::class, 'company_id');
    }

    public function instiute()
    {
        return $this->belongsTo(Institute::class, 'company_id');
    }

    public  function royal()
    {
        return $this->belongsTo(Royal::class, 'company_id');
    }

    public  function company()
    {
        // dd($this->type);
        return match ($this->type) {
            'local' => $this->local,
            'oem' => $this->oem,
            'institute' => $this->instiute,
            'royal' => $this->royal,
            'staff' => $this,
            defualt => null,
        };
    }

    public  function wishListID()
    {
        $serial = \Carbon\Carbon::parse($this->created_at)->format('y-m');
        return $this->project_type . '-' . $serial . '-' . (100 + $this->id);
    }

    public static function addWishList($profile_id, $type)
    {
        // dd(request()->all());
        return WishList::updateOrCreate([
            'company_id' => $profile_id,
            'type' => $type,
            'project_type' => request()->project_type,
            'category' => request()->kategori,
            'sector' => request()->sektor,
            'technology' => request()->bidang_keutamaan,
        ], [
            'company_id' => $profile_id,
            'type' => $type,
            'project_type' => request()->project_type,
            'category' => request()->kategori,
            'sector' => request()->sektor,
            'technology' => request()->bidang_keutamaan,
            'description' => request()->penerangan_terperinci,
            'tasks' => request()->tugas_pencapaian_utama,
            'target' => request()->sasaran,
            'results' => request()->hasil_projek,
            'duration' => request()->tempoh_projek,
            'benefits' => request()->kesan_manfaat,
        ]);
    }
}
