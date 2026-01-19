<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QPermission extends Model
{
    protected $guarded = [];
    protected $table = 'permissions';

    public static function addPermission()
    {
        return QPermission::updateOrCreate([
            'name' => request()->permission,
            'group_name' => request()->group_name,
            'guard_name' => 'web',
        ], [
            'name' => request()->permission,
            'guard_name' => 'web',
            'group_name' => request()->group_name,
            'description' => request()->desc,
        ]);
    }
}