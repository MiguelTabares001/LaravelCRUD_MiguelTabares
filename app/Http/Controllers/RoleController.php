<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        // dd($roles);
        return view('pages.role.list', compact('roles'));
    }

    public function create() {
        return view('pages.role.add');
    }

    public function store(Request $request) {
        $role = new Role();
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('list.role');
    }

    public function edit(string $id) {
        $role = Role::find($id);
        // dd($role);
        return view('pages.role.edit', compact('role'));
    }

    public function update(Request $request, $id) {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $role->save();
        return redirect()->route('list.role');
    }

    public function delete($id) {
        $role = Role::find($id);
        return view('pages.role.delete', compact('role'));
    }

    public function destroy($id) {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('list.role');
    }
}