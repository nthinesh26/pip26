<?php

namespace App\Models;

use App\WebTool;
use Illuminate\Database\Eloquent\Model;

class OEM extends Model
{
    protected $guarded = [];

    public  function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'company_id');
    }
    
    public  function fetchAddress()
    {
        return [
            'general' => $this->oem_address1.'<br />'.$this->oem_address2.'<br />'.$this->oem_postcode.'<br />'.$this->oem_city.'<br />'.'<br />'.$this->oem_country,
            'city' => $this->oem_city,
            'state' => $this->oem_country
        ];
    }

    public  function completionStatus()
    {
        return 0;
    }

    public static function addOEM(){
        $validate = User::where('email', request()->account_email)->first() ?? null;
        
        if(!$validate){
            $user = User::create([
                'email' => request()->account_email,
                'name' => request()->account_full_name,
                'type' => 'oem',
                'password' => bcrypt(request()->account_pwd),
                'mobile' => request()->account_phone,
                'token' => WebTool::enc(request()->account_pwd, 3),
                'status' => '[]',
            ]);
            

            if($user)
                return OEM::updateOrCreate([
                    'user_id' => $user->id,
                    'company_name' => request()->company_name,
                    'company_country' => request()->company_country,
                ], [
                    'company_name' => request()->company_name,
                    'company_country' => request()->company_country,
                    'company_registration_no' => request()->company_registration_no,
                    'company_year_established' => request()->company_year_established,
                    'company_type' => request()->company_type ?? request()->company_type_other,
                    'oem_address1' => request()->oem_address1,
                    'logo' => '/pip/assets/img/userProfileBotak.png',
                    'oem_address2' => request()->oem_address2,
                    'oem_postcode' => request()->oem_postcode,
                    'oem_city' => request()->oem_city,
                    'oem_country' => request()->oem_country,
                    'company_website' => request()->company_website,
                    'ack_name' => request()->ack_name,
                    'ack_position' => request()->ack_position,
                    'ack_date' => request()->ack_date,
                    'consent_pdpa' => request()->consent_pdpa,
                    'status' => 'created',
                ]);
        }
        return null;
    }
}
