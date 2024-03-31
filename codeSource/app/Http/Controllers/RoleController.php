<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleRoute;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $routes = Route::all();

        return view("back-office.roles", compact('roles', 'routes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'uri' => 'required|array'
        ]);

        $role = new Role();
        $role->name = $validatedData['name'];
        $role->save();

        if ($role) {
            $permissions = $validatedData['uri'];

            $rolePermissions = [];

            foreach ($permissions as $permissionId) {
                $rolePermissions[] = [
                    'role_id' => $role->id,
                    'route_id' => $permissionId
                ];
            }

            RoleRoute::insert($rolePermissions);
        }

        return redirect()->route('roles.index');
    }
    public function destroy()
    {
        $deleteRole = Role::find($_POST["id"]);
        $deleteRole->delete();
        return redirect()->route('roles.index');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'uri' => 'required|array'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $validatedData['name'];
        $role->save();

        if ($role) {
            $permissions = $validatedData['uri'];

            $rolePermissions = [];

            foreach ($permissions as $permissionId) {
                $rolePermissions[] = [
                    'role_id' => $role->id,
                    'route_id' => $permissionId
                ];
            }

            RoleRoute::where('role_id', $role->id)->delete();
            RoleRoute::insert($rolePermissions);
        }

        return redirect()->route('roles.index');
    }
}
