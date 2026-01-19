<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\QPermission;
use App\Models\RoleHasPerm;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        if (!$message = session('message'))
            $message = '';

        return view('admin.users.create')->with([
            'message' => $message,
            'title' => 'Create Users Window',
            'users' => User::all(),
        ]);
    }

    
    public function fetchSelectBox(){
        $permissions = RoleHasPerm::where('role_id', request()->user)->pluck('permission_id');
        return view('admin.users.select-box')->with([
            'permissions' => $permissions,
        ]);
    }

    public function addRole()
    {
        $role = \App\Models\Role::addRole();
        if ($role)
            session()->flash('message', '<script>alert("Role has been Added Successfully");</script>');
        else
            session()->flash('message', '<script>alert("Something Went Wrong!");</scripit>');

        return redirect('/portal/user/management');
    }

    public function addPermission()
    {
        $permission = QPermission::addPermission();
        if ($permission)
            session()->flash('message', '<script>alert("Permission Added");</script>');
        else
            session()->flash('message', '<script>alert("Something went wrong";</script>');

        return redirect('/portal/user/management');
    }

    public function permissionSync()
    {
        $role = request()->role;
        $permission = request()->permission;
        $flag = request()->flag;

        $role = Role::where('name', $role)->where('guard_name', 'web')->first() ?? null;
        $permission = Permission::where('name', $permission)->where('guard_name', 'web')->first() ?? null;
        $res = null;
        if ($role) {
            if ($permission) {
                if ($flag > 0) {
                    $res = $role->givePermissionTo($permission);
                } else {
                    $res = $role->revokePermissionTo($permission);
                }
            }
        }

        if ($res && $flag > 0)
            echo '<script>alert("Permission Assigned");</script>';
        elseif ($res && $flag == 0)
            echo '<script>alert("Permission Revoked");</script>';
        else
            echo '<script>alert("Something went wrong");</script>';
 
   }
}