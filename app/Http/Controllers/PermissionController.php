<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permission.index',[
            'permissions' => Permission::all()
        ]);
    }
    public function store(){
        request()->validate([
            'name'=>'required',
        ]);
        Permission::create([
            'name' =>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }
    public function destroy(Permission $permission){
//        dd($permission->name);
        $name = $permission->name;
        $permission->delete();
        session()->flash('permission-deleted','The permission - '.$name.' - Deleted');
        return back();
    }
    public function edit(Permission $permission){

        return view('admin.permission.edit',[
            'permission'=>$permission,

        ]);
    }
    public function update(Permission $permission){
        $name = $permission->name;
        request()->validate([
            'name'=>'required',
        ]);
//        Role::findOrFail($id)->update([
//            'name' =>Str::ucfirst(request('name')),
//            'slug'=>Str::of(Str::lower(request('name'))),
//        ]);
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')));
        if($permission->isDirty('name')){
            session()->flash('update-role','The Role - '.$name .' - Updated');
            $permission->save();
        }
        else{
            session()->flash('noUpdate-permission','Nothing To Update');
        }
        return redirect()->route('permissions.index');
    }
}
