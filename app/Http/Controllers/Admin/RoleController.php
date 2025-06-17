<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:user-view')->only('index');
    //     $this->middleware('permission:user-create')->only(['create', 'store']);
    //     $this->middleware('permission:user-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:user-delete')->only('destroy');
    // }

    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->whereNotIn('name', ['admin', 'user'])->get();
        $permissions = Permission::orderBy('name')->get();

        return view('admin.role.index', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,id',
            ]);

            $role = Role::create(['name' => $request->name]);

            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name');

            $role->syncPermissions($permissionNames);

            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->save();

        $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name');

        $role->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
