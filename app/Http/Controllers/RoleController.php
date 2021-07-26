<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index(){
        return view('admin.role.index' , [
            'roles' => Role::all()
        ]);
    }
    public function store(){
        request()->validate([
            'name'=>'required',
        ]);
        Role::create([
            'name' =>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }
    public function destroy(Role $role){
        $name = $role->name;
        $role->delete();
        session()->flash('role-deleted','The Role -'.$name.'- Deleted');
        return back();
    }
    public function edit(Role $role){

        return view('admin.role.edit',[
            'role'=>$role,
            'permissions'=> Permission::all()
        ]);
    }
    public function update(Role $role){
        $name = $role->name;

         request()->validate([
            'name'=>'required',
        ]);
//        Role::findOrFail($id)->update([
//            'name' =>Str::ucfirst(request('name')),
//            'slug'=>Str::of(Str::lower(request('name'))),
//        ]);
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')));
            if($role->isDirty('name')){
            session()->flash('update-role','The Role - '.$name .' - Updated');
            $role->save();
        }
        else{
            session()->flash('noUpdate-role','Nothing To Update');
        }
        return redirect()->route('roles.index');
    }
    public function attach(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }
    public function detach(Role $role){

        $role->permissions()->detach(request('permission'));
        return back();
    }
}
