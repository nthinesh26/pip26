<?php

namespace App\Models;

use App\WebTool;
use Illuminate\Database\Eloquent\Model;

class Royal extends Model
{
    protected $guarded = [];

    public  function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function completionStatus()
    {
        return 0;
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'company_id');
    }

    public  function fetchType()
    {
        $type = $this->jenis_agensi;
        // dd($type);
        $sets = [
            'ATM' => 'Angkatan Tentera Malaysia',
            'Universiti_Pusat_Latihan' => 'Universiti / Pusat Latihan',
            'Badan_Profesional' => 'Badan Profesional',
            'Jabatan_Agensi_Kerajaan' => 'Jabatan / Agensi Kerajaan (Selain Akademi)',
            'Pusat_Penyelidikan_Kajian' => 'Pusat Penyelidikan dan Kajian',
            'Lain-lain (Nyatakan)' => $this->atm_branch,
        ];
        return $sets[$type];
    }

    public  function fetchRecord()
    {
                
    }

    public  function fetchAddress()
    {
        return [
            'general' => $this->agensi_address1.'<br />'.$this->agensi_address2.'<br />'.$this->postcode.'<br />'.$this->city.'<br />'.$this->state,
            'city' => $this->city,
            'state' => $this->state
        ];
    }

    public static function addRoyal(){
        $validate = User::where('email', request()->account_email)->first() ?? null;
        if(!$validate){
            $user = User::create([
                'email' => request()->account_email,
                'name' => request()->account_name,
                'type' => 'royal',
                'mobile' => request()->account_phone,
                'password' => bcrypt(request()->account_pwd),
                'token' => WebTool::enc(request()->account_pwd, 3),
                'status' => '[]'
            ]);
            if($user){
                return $create = Royal::updateOrCreate([
                   'agensi_name' => request()->agensi_name,
               ], [
                'user_id' => $user->id,
                'agensi_name' => request()->agensi_name,
                'agency_website' => request()->agensi_website,
                'agency_phone' => request()->agensi_phonenumber ?? '_',
                'agency_email' => request()->agensi_email,
                'logo' => 'not-submitted',
                'company_established' => request()->company_established,
                'jenis_agensi' => (request()->jenis_agensi == 'Lain-lain' ? request()->lain_nyatakan : request()->jenis_agensi),
                'atm_branch' => request()->atm_branch ?? '_',
                'atm_pasukan_nyatakan' => request()->atm_pasukan_nyatakan ?? '_',
                'lain_nyatakan' => request()->lain_nyatakan ?? '_',
                'kementerian' => request()->kementerian,
                'agensi_address1' => request()->agensi_address1,
                'agensi_address2' => request()->agensi_address2,
                'postcode' => request()->postcode,
                'city' => request()->city,
                'state' => request()->state,
                'agensifacility_address1' => request()->agensifacility_address1 ?? '_',
                'agensifacility_address2' => request()->agensifacility_address2 ?? '_',
                'agensifacility_postcode' => request()->agensifacility_postcode ?? '_',
                'agensifacility_city' => request()->agensifacility_city ?? '_',
                'agensifacility_state' => request()->agensifacility_state ?? '_',
                'name_ack' => request()->name_ack,
                'name_jobposition' => request()->name_jobposition,
                'ack_date' => request()->ack_date,
                'pdpa_ack' => request()->pdpa_ack,
                'status' => 'registered',
            ]);
            }
        }
        return null;
    }
}
