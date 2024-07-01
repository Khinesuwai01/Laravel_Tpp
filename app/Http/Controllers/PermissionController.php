<?php

namespace App\Http\Controllers;

use App\Http\Repository\Permission\PermissionRepositoryInterface;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->get();
        return view('role-permission.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name'
            ]
            ]);

        Permission::create([
            'name'=> $request->name,
        ]);
        return redirect('permissions')->with('status', 'Permission Created Successfully');
    }

    public function edit($id)
    {
        $permissions = $this->permissionRepository->findById($id);
        return view('role-permission.permission.edit',compact('permissions'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name,' .$permission->id
            ]
            ]);

        $permission->update([
            'name'=>$request->name
        ]);
        return redirect('permissions')->with('status', 'Permission Updated Successfully');
    }

    public function destroy($permissionId){
        $permissions = $this->permissionRepository->findById($permissionId);
        $permissions->delete();
        return redirect('permissions')->with('status', 'Permission Deleted Successfully');
    }

}