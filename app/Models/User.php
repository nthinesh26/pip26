<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'type',
        'mobile',
        'password',
        'token',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function local()
    {
        return $this->hasOne(LocalCompany::class);
    }

    public function oem(){
        return $this->hasOne(OEM::class);
    }

    public function instiute(){
        return $this->hasOne(Institute::class);
    }

    public function admin(){
        return $this->hasOne(AdminUser::class);
    }

    public  function royal()
    {
        return $this->hasOne(Royal::class);
    }

    public  function displayType()
    {
        $types = [
            'local' => 'Local Company',
            'royal' => 'Government Agency',
            'oem' => 'OEM',
            'institute' => 'Research Institute and Academia'
        ];
        return $types[$this->type];
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    // helper function
    public function profile()
    {
        return match ($this->type) {
            'local' => $this->local,
            'oem' => $this->oem,
            'institute' => $this->instiute,
            'royal' => $this->royal,
            'staff' => $this,
            'admin' =>  $this->admin,
        };
    }

    public  function companyName()
    {
        $type =  [
            'local' => 'company_name',
            'oem' => 'company_name',
            'royal' => 'agensi_name',
            'institute' => 'organisation_name',
        ];
        return $type[$this->type];
    }

    public  function desc()
    {
        $type =  [
            'local' => 'nyatakan_kepakaran',
            'oem' => '_',
            'royal' => '_',
            'institute' => 'org_desciption',
        ];
        return $type[$this->type];
    }

    public  function desc_render()
    {
        $type =  [
            'local' => 'nyatakan_kepakaran',
            'oem' => '_',
            'royal' => '_',
            'institute' => 'org_desciption',
        ];
        if($this->type == 'institute'){
            $org = json_decode($this->profile()->org_desciption);
            echo $org->type;
            return $org->type;
        }else{
            return $type[$this->type];
        }
    }
}
