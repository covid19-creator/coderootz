<?php

// app/Http/Middleware/FetchUserMenus.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Menu;

class FetchUserMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            $role_name = Role::where('id', $role)->first()->name;
            $roleMenus = Role::where('id', $role)->first()->menus;

            // Assuming menus are stored as JSON
            $menuIds = json_decode($roleMenus, true);

            // Fetch only the required fields
            $menus = Menu::whereIn('id', $menuIds)->get(['id', 'name', 'route']);

            // Share menus with all views
            view()->share('menus', $menus);
            view()->share('role_name', $role_name);
        }

        return $next($request);
    }
}

