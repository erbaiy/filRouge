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
        return view("back-office.roles", compact('roles'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $role = new Role();
        $role->name = $validatedData['name'];
        $role->save();

        if (!$role) {
            return back()
                ->with('error', 'error while saving role');
        }
        return back()
            ->with('seccess', 'role creact was successfully');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $validatedData['name'];
        $role->save();

        return redirect()->route('roles.index');
    }
}
