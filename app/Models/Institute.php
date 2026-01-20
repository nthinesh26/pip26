<?php

namespace App\Models;

use App\WebTool;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $guarded = [];

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'company_id');
    }

    public  function completionStatus()
    {
        return 0;
    }

    public  function fetchAddress()
    {
        return [
            'general' => $this->akademia_address1.'<br />'.$this->akademia_address2.'<br />'.$this->akademia_postcode.'<br />'.$this->akademia_city.'<br />'.$this->akademia_state,
            'city' => $this->akademia_city,
            'state' => $this->akademia_state
        ];
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public static function createInstitute(){
        
        $validate = User::where('email', request()->account_email)->first() ?? null;
        if(!$validate){
            $user = User::create([
                'email' => request()->account_email,
                'name' => request()->account_full_name,
                'type' => 'institute',
                'password' => bcrypt(request()->password),
                'mobile' => request()->account_mobile_phone,
                'token' => WebTool::enc(request()->password, 3),
                'status' => '[]',
            ]);

            if($user){
                $desc = [];
                if(request()->orgType)
                    $desc['type'] = request()->orgType;
            if(request()->iptType)
                    $desc['iType'] = request()->iptType;
                
                $org_desciption = json_encode($desc);
                
                $post_code = request()->akademia_postcode_1 ?? '_';
                $city = request()->akademia_city_1 ?? '_';
                $address_2 = $post_code.', '.$city;

                return $ins = Institute::updateOrCreate([
                    'user_id' => $user->id,
                    'organisation_name' => request()->organisation_name,
                    'organisation_established_date' => request()->organisation_established_date,
                ], [
                    'user_id' => $user->id,
                    'org_desciption' => $org_desciption,
                    'organisation_name' => request()->organisation_name,
                    'organisation_established_date' => request()->company_established,
                    'mandat' => request()->mandat ?? '_',
                    'logo' => '/pip/assets/img/userProfileBotak.png',
                    'parent_ministry' => request()->ministry ?? request()->ministry_other,
                    'akademia_address1' => request()->akademia_address1,
                    'akademia_address2' => request()->akademia_address2 ?? '_',
                    'akademia_postcode' => request()->hq_postcode ?? '_',
                    'akademia_city' => request()->hq_city,
                    'akademia_state' => request()->akademia_state,
                    'akademia_alt_address1' => request()->akademia_alt_address1 ?? '_',
                    'akademia_alt_address2' => (request()->akademia_alt_address2  ?? '_') . $address_2,
                    'companyfacility_state' => request()->companyfacility_state ?? '_',
                    'organisation_website' => request()->organisation_website,
                    'organisation_phonenumber' => request()->organisation_phonenumber,
                    'ack_name' => request()->ack_name,
                    'ack_position' => request()->ack_position,
                    'ack_date' => request()->ack_date,
                    'consent_pdpa' => request()->consent_pdpa,
                    'status' => 'registered'
                ]);    
            }
        }
        return null;
    }
}
