<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view ('admin.roles.index', ['roles' =>Role::all()]);
    }

    public function store()
    {
        //dd(request('name'));

        request()->validate([
            'name' =>'required'
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);
        
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('role-deleted', $role->name .' role has been deleted');

        return back();
    }

    public function show(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role)
    {
        //dd($role);
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::slug(request('name'), '-');
        
        if($role->isDirty('name'))
        {
            session()->flash('role-updated', request('name') .' has been updated');
            $role->save();
        } else {
            session()->flash('role-updated', 'Nothing to update');
            $role->save();
        }
        

        return back();
    }

    public function attach_permission(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
