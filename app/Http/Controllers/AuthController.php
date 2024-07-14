<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
       
        
        return redirect()->intended('dashboard');
    }

    return redirect()->route('login')->withErrors(['emailPassword' => 'Email address or password is incorrect.']);
}



    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $data['role_id'] = 1;       
        $this->create($data);
         
        return redirect()->route('login')->withSuccess('You are registered');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            $role = Auth::user()->role_id;
            $roleMenus = Role::find($role)->menus;
            $role_name = Role::find($role)->name;
            $menuIds = json_decode($roleMenus);
    
            // Fetch menu details
            $menus = Menu::whereIn('id', $menuIds)->get(['id', 'name', 'route']);
            return view('dashboard', compact('menus','role_name'));
        }

        return redirect()->route('login')->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login');
    }
}
