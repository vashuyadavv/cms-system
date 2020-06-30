<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('admin.users.profile', ['user'=>$user]);
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
}
