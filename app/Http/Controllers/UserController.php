<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::select('users.id','users.name as user_name','users.last_name','users.mail','users.phone','users.address','roles.rol_name as role')
        ->join('roles','users.role','=','roles.id')->get();
        // dd($users);
        return view('pages.user.list', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('pages.user.add', compact('roles'));
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->mail = $request->input('mail');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = $request['role'];
        $user->save();
        return redirect()->route('list.user');
    }

    public function edit(string $id) {
        $roles = Role::all();
        $user = User::find($id);
        $userRole = Role::select('roles.rol_name','roles.id')->where('roles.id','=',$user->role)->first();
        // dd($userRoles);
        return view('pages.user.edit', compact('roles','user','userRole'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->mail = $request->input('mail');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = $request['role'];
        $user->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $user->save();
        return redirect()->route('list.user');
    }

    public function delete($id) {
        $user = User::select('users.id','users.name as user_name','users.last_name','users.mail','users.phone','users.address','roles.rol_name as role')
        ->where('users.id','=',$id)->join('roles','users.role','=','roles.id')->first();
        return view('pages.user.delete', compact('user'));
    }

    public function destroy($id) {
        $product = User::find($id);
        $product->delete();
        return redirect()->route('list.user');
    }
}
