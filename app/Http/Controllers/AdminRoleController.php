<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(
        Role $role,
        Permission $permission
    )
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->getPermissionParent();
        return view('admin.role.add', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        if ( isset($request->permisson_id) && $request->permisson_id ) {
            $role->permissions()->attach($request->permisson_id);
        }
        return redirect(route('role.index'));
    }

    public function edit($id)
    {
        $permissions = $this->getPermissionParent();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit', compact('permissions', 'role', 'permissionChecked'));
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'name' => $request->name,
            'display_name' => $request->display_name,
        ];
        $this->role->find($id)->update($dataUpdate);
        $role = $this->role->find($id);
        if ( isset($request->permisson_id) && $request->permisson_id ) {
            $role->permissions()->sync($request->permisson_id);
        }
        return redirect(route( 'role.index'));
    }

    public function getPermissionParent()
    {
        return $this->permission->where('parent_id', 0)->get();
    }

}
