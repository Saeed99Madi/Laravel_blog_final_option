<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }
    //
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.user.profile', ['user' => $user,
            'roles'=>Role::all()]);
    }
     //
    public function update(User $user)
    {
        $inputs = request()->validate([
            'username'=>['required', 'string', 'max:255','alpha_dash'],
            'name'=>['required' ,'string', 'max:255'],
            'email'=>['required','email', 'max:255'],
            'avatar'=>['file:jpeg,png'],
        ]);
        if(request('avatar')) {
            $inputs['avatar']= request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }
    public function attach(User $user){
        $user->roles()->attach(request('role'));
        return back();

    }
    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user){
        $name = $user->name;
        $user->delete();
        session()->flash('delete-user','The User- '.$name.' -Deleted');
        return back();
    }
}
