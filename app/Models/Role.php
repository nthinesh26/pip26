<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = [];


    public static function addRole()
    {
        return Role::updateOrCreate([
            'name' => request()->name,
            'guard_name' => 'web'
        ], [
            'name' => request()->name,
            'guard_name' => 'web',
            'description' => request()->reason
        ]);
    }
}
