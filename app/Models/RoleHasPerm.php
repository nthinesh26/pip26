<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPerm extends Model
{
    protected $guarded = [];
    protected $table = 'role_has_permissions';
}