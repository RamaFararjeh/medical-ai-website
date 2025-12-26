<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    // List
    public function index()
    {
        $roles = Role::orderByDesc('id')->paginate(15);
        return view('admin-panel.roles.list', compact('roles'));
    }

    // Add page
    public function create()
    {
        $groupedPermissions = $this->groupPermissions(
            Permission::orderBy('name')->get()
        );

        return view('admin-panel.roles.add', compact('groupedPermissions'));
    }

    // Store
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100','unique:roles,name'],
            'permissions' => ['array'],
            'permissions.*' => ['integer','exists:permissions,id'],
        ]);

        DB::transaction(function () use ($data) {
            $role = Role::create(['name' => $data['name']]);
            $role->permissions()->sync($data['permissions'] ?? []); // why: يربط دفعة واحدة ويمنع التكرار
        });

        return redirect()->route('roles.index')->with('success','Role created successfully.');
    }

    // Edit page
    public function edit(Role $role)
    {
        $groupedPermissions = $this->groupPermissions(
            Permission::orderBy('name')->get()
        );
        $selected = $role->permissions()->pluck('permissions.id')->toArray();

        return view('admin-panel.roles.edit', compact('role','groupedPermissions','selected'));
    }

    // Update
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100', Rule::unique('roles','name')->ignore($role->id)],
            'permissions' => ['array'],
            'permissions.*' => ['integer','exists:permissions,id'],
        ]);

        DB::transaction(function () use ($data, $role) {
            $role->update(['name' => $data['name']]);
            $role->permissions()->sync($data['permissions'] ?? []); // why: يحذف غير المختارة ويثبت الحالية
        });

        return redirect()->route('roles.index')->with('success','Role updated successfully.');
    }

    // Delete
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role deleted.');
    }

    /**
     * @param \Illuminate\Support\Collection $permissions
     * @return \Illuminate\Support\Collection grouped: [
     *   key => ['key'=>string,'label'=>string,'items'=>Collection<Permission>]
     * ]
     */
    private function groupPermissions($permissions)
    {
        // users.list -> users
        return $permissions->groupBy(function ($p) {
            return explode('.', $p->name)[0];
        })->map(function ($perms, $key) {
            return [
                'key' => $key,
                'label' => ucwords(str_replace(['-','_'], ' ', $key)),
                'items' => $perms->values(),
            ];
        });
    }
}
