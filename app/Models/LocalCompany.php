<?php

namespace App\Models;

use App\WebTool;
use Illuminate\Database\Eloquent\Model;

class LocalCompany extends Model
{
    protected $guarded = [];

    // relations
    public function icps()
    {
        return $this->hasMany(ICP::class, 'company_id');
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function directors()
    {
        return $this->hasMany(Director::class);
    }



    // functions
    public function completeReg()
    {
        return $this->update([
            'name_ack' => request()->declaration_name,
            'name_jobposition' => request()->declaration_position,
            'ack_date' => request()->ack_date,
        ]);
    }
    public function updateOfficer()
    {
        $requests = [
            'contact_name',
            'contact_id_passport',
            'company_phonenumber',
            'company_email',
            'contact_nationality',
            'nyatakan_kepakaran',
            'contact_position',
            'contact_mobile_phone',
            'contact_official_email'
        ];
        $flag = false;
        foreach ($requests as $req) {
            if (request()->$req != '' && strlen(request()->$req) > 5)
                $flag = true;
            else
                $flag = false;
        }
        $pads = [];
        if ($flag) {
            foreach ($requests as $request) {
                $pads[$request] = request()->$request;
            }
        }

        $pads = json_encode($pads);
        return $this->update([
            'contact_officer' => $pads,
        ]);
    }

    public  function completionStatus()
    {
        $pg = 1;
        if ($this->status == 'updated-1')
            $pg++;
        if ($this->directors->count() > 0)
            $pg++;
        if ($this->icps->where('status', 'active')->count() > 0)
            $pg++;
        if ($this->status == 'completed')
            $pg = 4;

        return number_format(($pg * 100 / 4), 1);
    }

    public function fetchRecord()
    {
        $val = [];
        $fields = ['company_name', 'company_established', 'company_ssm', 'company_phonenumber', 'nyatakan_kepakaran', 'company_email', 'company_website', 'company_type', 'company_type_other', 'companygroup_type', 'eperolehannumber', 'company_address', 'companyfacility_address', 'companystatus_bumi', 'companystatus_nonbumi', 'companystatus_women', 'companystatus_jvforeign', 'name_ack', 'name_jobposition', 'ack_date', 'pdpa_ack'];

        $val['account_name'] = $this->user->name;
        $val['account_email'] = $this->user->email;
        $val['account_phone'] = $this->user->mobile;
        foreach ($fields as $field) {
            if ($field == 'company_address') {
                // {"line_1":"No. 7, Jalan","line_2":"Cyber 6","postal_code":"63000","city":"Cyberjaya","state":"Selangor"}
                $data = json_decode($this->$field);
                $val['company_address1'] = $data->line_1;
                if ($data->line_2 != '_')
                    $val['company_address2'] = $data->line_2;
                $val['company_postcode'] = $data->postal_code;
                $val['company_city'] = $data->city;
                $val['company_state'] = $data->state;
            }
            if ($field == 'companyfacility_address') {
                // {"line_1":"_","line_2":"_","postal_code":"_","city":"_","state":"_"}
                $data = json_decode($this->$field);
                if ($data->line_1 != '_')
                    $val['companyfacility_address1'] = $data->line_1;
                if ($data->line_2 != '_')
                    $val['companyfacility_address2'] = $data->line_2;
                if ($data->postal_code != '_')
                    $val['companyfacility_postcode'] = $data->postal_code;
                if ($data->city != '_')
                    $val['companyfacility_city'] = $data->city;
                if ($data->state != '_')
                    $val['companyfacility_state'] = $data->state;
            }
            $exps = json_decode($this->exps);

            $data = str_replace("\r\n", " ", $this->$field);
            if($data == 'not-submitted')
                $data = '';
            $val[$field] = str_replace('"', "'", $data);
        }
        return WebTool::passingByName($val);
    }

    public function ownership()
    {
        return [
            'native' => explode("_", $this->companystatus_bumi),
            'non_land' => explode("_", $this->companystatus_nonbumi),
            'woman_ownership' => explode('_', $this->companystatus_women),
            'foreign_owner' => explode('_', $this->companystatus_jvforeign)
        ];
    }

    public  function displayOwnership()
    {
        $dict = [
            'native' => 'Bumiputera',
            'non_land' => 'Non-Bumiputera',
            'woman_ownership' => 'Women-Owned',
            'foreign_owner' => 'Joint Venture',
        ];

        $rec = [];
        foreach ($this->ownership() as $key => $val) {
            if (count($this->ownership()[$key]) > 1)
                $rec[$dict[$key]] = $val[1];
            else
                $rec[$dict[$key]] = '_';
        }

        return $rec;
    }

    public static function addCompany()
    {
        try {
            $user = $local = null;
            $validate = User::where('email', request()->account_email)->first() ?? null;
            $company_address = json_encode([
                'line_1' => request()->company_address1,
                'line_2' => request()->company_address2 ?? '',
                'postal_code' => request()->company_postcode,
                'city' => request()->company_city,
                'state' => request()->company_state,
            ]);

            $companyfacility_address = json_encode([
                'line_1' => request()->companyfacility_address1 ?? '_',
                'line_2' => request()->companyfacility_address2 ?? '_',
                'postal_code' => request()->companyfacility_postcode ?? '_',
                'city' => request()->companyfacility_city ?? '_',
                'state' => request()->companyfacility_state ?? '_',
            ]);
            $details = [];

            if(request()->kepakaran_lain){
                foreach(request()->kepakaran_bidang as $source)
                    $details[] = $source;
                array_push($details, request()->kepakaran_lain);
                $exps = json_encode($details);
            }
            else{
                $exps = json_encode(request()->kepakaran_bidang);
            }
            if (!$validate)
                $user = User::create([
                    'name' => request()->account_name,
                    'email' => request()->account_email,
                    'type' => 'local',
                    'mobile' => request()->account_phone,
                    'password' => bcrypt(request()->account_pwd),
                    'token' => WebTool::enc(request()->account_pwd, 3),
                    'status' => '[]',
                ]);
            
            if ($user)
                return LocalCompany::updateOrCreate([
                    'company_website' => request()->company_website,
                    'company_name' => request()->company_name,
                    'companygroup_type' => request()->companygroup_type,
                ], [
                    'user_id' => $user->id,
                    'company_name' => request()->company_name,
                    'logo' => 'not-submitted',
                    'company_established' => request()->company_established,
                    'company_ssm' => request()->company_ssm ?? '',
                    'company_website' => request()->company_website ?? '',
                    'company_type' => (request()->company_type == 'other' ? request()->company_type_other : request()->company_type),
                    'companygroup_type' => request()->companygroup_type,
                    'company_phonenumber' => request()->company_phonenumber ?? '',
                    'company_email' => request()->company_email ?? '',
                    'nyatakan_kepakaran' => request()->nyatakan_kepakaran ?? '',
                    'eperolehannumber' => request()->eperolehannumber ?? 'not-submitted',
                    'company_address' => $company_address,
                    'companyfacility_address' => $companyfacility_address,
                    'companystatus_bumi' => request()->companystatus_bumi ?? 'not-submitted',
                    'companystatus_nonbumi' => request()->companystatus_nonbumi ?? 'not-submitted',
                    'companystatus_women' => request()->companystatus_women ?? 'not-submitted',
                    'companystatus_jvforeign' => request()->companystatus_jvforeign ?? 'not-submitted',
                    'name_ack' => request()->name_ack,
                    'name_jobposition' => request()->name_jobposition ?? 'not-submitted',
                    'exps' => $exps,
                    'contact_officer' => '[]',
                    'ssm_cert_upload' => 'will_be_updated',
                    'mof_cert_upload' => 'will_be_updated',
                    'ack_date' => request()->ack_date,
                    'pdpa_ack' => request()->pdpa_ack,
                    'status' => 'registered',
            ]);
        else
            return null;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCompany($page)
    {
        try {
            $user = auth()->user()->profile();
            if ($user) {
                $ssm_cert_upload = $user->ssm_cert_upload;

                $mof_cert_upload = $user->mof_cert_upload;
                if($user->id == 21)
                    dd(requesr()->all());
                if ((request()->ssm_cert_upload) && (request()->mof_cert_upload)) {
                    $ssm_cert_upload = WebTool::privateStore('ssm_cert_upload', 'documents/local-company/ssm_certifcates');
                    $mof_cert_upload = WebTool::privateStore('mof_cert_upload', 'documents/local-company/mof_certificates');
                }

                $company_address = json_encode([
                    'line_1' => request()->company_address1,
                    'line_2' => request()->company_address2 ?? '',
                    'postal_code' => request()->company_postcode,
                    'city' => request()->company_city,
                    'state' => request()->company_state,
                ]);

                $companyfacility_address = json_encode([
                    'line_1' => request()->companyfacility_address1 ?? '_',
                    'line_2' => request()->companyfacility_address2 ?? '_',
                    'postal_code' => request()->companyfacility_postcode ?? '_',
                    'city' => request()->companyfacility_city ?? '_',
                    'state' => request()->companyfacility_state ?? '_',
                ]);

                $exps = json_encode(request()->kepakaran_bidang);
                $user = auth()->user()->update([
                    'name' => request()->account_name,
                    'mobile' => request()->account_phone,
                ]);

                return $p1 = auth()->user()->profile()->update([
                    'company_name' => request()->company_name,
                    'company_established' => request()->company_established,
                    'company_ssm' => request()->company_ssm,
                    'company_website' => request()->company_website,
                    'company_type' => (request()->company_type == 'other' ? request()->company_type_other : request()->company_type),
                    'company_phonenumber' => request()->company_phonenumber,
                    'company_email' => request()->company_email,
                    'companystatus_bumi' => request()->companystatus_bumi ?? 'not-submitted',
                    'companystatus_nonbumi' => request()->companystatus_nonbumi ?? 'not-submitted',
                    'companystatus_women' => request()->companystatus_women ?? 'not-submitted',
                    'companystatus_jvforeign' => request()->companystatus_jvforeign ?? 'not-submitted',
                    'nyatakan_kepakaran' => request()->nyatakan_kepakaran,
                    'companygroup_type' => request()->companygroup_type,
                    'eperolehannumber' => request()->eperolehannumber,
                    'company_address' => $company_address,
                    'companyfacility_address' => $companyfacility_address,
                    'exps' => $exps,
                    'ssm_cert_upload' => $ssm_cert_upload,
                    'mof_cert_upload' => $mof_cert_upload,
                    'status' => 'updated-1',
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
