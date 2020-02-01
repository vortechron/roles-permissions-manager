<?php

namespace Vortechron\RPManager\Models;

use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    public static function indexAction()
    {
        View::share('roles', static::all());
    }

    public static function createAction()
    {
        View::share('_label', 'Create New Role');
        View::share('role', new static);
        View::share('permissions', Permission::all());
    }

    public static function storeAction($request)
    {
        $role = static::firstOrCreate(['name' => $request->name]);
        foreach ($request->input('permissions', []) as $permission => $value) {
            $role->givePermissionTo($permission);
        }
    }

    public static function editAction($role)
    {
        View::share('_label', 'Edit Role');
        View::share('role', $role);
        View::share('permissions', Permission::all());
    }

    public static function updateAction($role, $request)
    {
        $role->permissions()->detach();
        
        foreach ($request->input('permissions', []) as $permission => $value) {
            $role->givePermissionTo($permission);
        }
    }

    public static function destroyAction($role)
    {
        if ($role->id == 1) error('Admin cannot be delete.');

        $role->permissions()->detach();
        $role->delete();
    }
    
}