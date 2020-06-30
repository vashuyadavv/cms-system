<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function update(User $user)
    {
    
            $inputs = request()->validate([
                'username' => 'required|string|max:255|alpha_dash',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'avatar' => 'file'
            ]);

            //dd(request('avatar'));
            
            if(request('avatar'))
            {
                $inputs['avatar'] = request('avatar')->store('images');
            }

            $user->update($inputs);
            return back();
        
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }

    public function attach(User $user)
    {
        //dd(request('role'));
        //dd($user);

        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user)
    {
        //dd(request('role'));
        //dd($user);

        $user->roles()->detach(request('role'));
        return back();
    }
}
