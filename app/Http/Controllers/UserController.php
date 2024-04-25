<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $permissions = Route::all();
        $roles = Role::all();
        $users = User::join('role', 'users.role_id', "=", 'role.id')->select("users.*", "role.name as role_name")
            ->where('role.name', '!=', "admin")
            ->get();
        // dd($roles);
        return view('back-office.user.index', compact('users', 'permissions', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $role = User::find($id);
        if ($role) {
            $role->role_id = $request->role_id;
            $role->save();
            return redirect()->route('users.index');
        }
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $deleteRole = User::find($id);
        $deleteRole->delete();
        if (!$deleteRole->delete()) {
            return redirect()->back()->with('error', 'room delete seccess');
        }

        return redirect()->back()->with('seccess', 'room delete seccess');
    }
    public function block($id)
    {
        $role = User::find($id);
        if (!$role) {
            return redirect()->back()->with('erorr', 'erorr');
        }
        $role->isBlocked = true;
        $role->save();
        return redirect()->back()->with('seccess', 'user blocked with seccess');
    }
}
