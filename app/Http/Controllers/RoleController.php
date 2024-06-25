<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role-permission.role.index',compact('roles'));
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);

        Role::create([
            'name'=> $request->name,
        ]);
        return redirect('roles')->with('status', 'Role Created Successfully');
    }

    public function edit($id)
    {
        $roles = Role::where('id', $id)->first();
        return view('role-permission.role.edit',compact('roles'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name,' .$role->id
            ]
            ]);

        $role->update([
            'name'=>$request->name
        ]);
        return redirect('roles')->with('status', 'Role Updated Successfully');
    }

    public function destroy($rolesId){
        $roles = Role::find($rolesId);
        $roles->delete();
        return redirect('roles')->with('status', 'Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        // checked db data for checkbox
        $rolePermissions = DB::table("role_has_permissions")
            ->where('role_has_permissions.role_id', $roleId)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('role-permission.role.add-permission',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }
    public function givePermissionToRole(Request $request , $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Permission added to role successfully');
    }
}
