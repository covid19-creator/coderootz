<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    // public function index(){
        
    // }
    public function user_management(Request $request) {
        $users = User::all();
        $roles = Role::all();
        // Prepare the data to be used in the view
        $userData = [];
        foreach ($users as $user) {
            $role = Role::find($user->role_id);
            $userData[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $role->name ?? 'N/A',
            ];
        }
    
        return view('user_management', compact('userData', 'roles'));
    }
    

    public function updateUserRole(Request $request, $userId)
{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
    ]);

    $user = User::find($userId);
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $user->role_id = $request->role_id;
    $user->save();

    return redirect()->back();
}

public function role_management(Request $request) {
    $menus = Menu::all();
    $roles = Role::all();

    return view('role_management', compact('menus', 'roles'));
}

public function addRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('role_name');
        $role->menus = json_encode($request->input('menus'));
        $role->save();

        return redirect()->back()->with('success', 'Role added successfully!');
    }

    public function updateRole(Request $request)
    {
        $role = Role::find($request->input('role_id'));
        $role->name = $request->input('role_name');
        $role->menus = json_encode($request->input('menus'));
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully!');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect()->back()->with('success', 'Role deleted successfully!');
        }
        return redirect()->back()->with('error', 'Role not found!');
    }
    
}
