<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            // Verifica se o usuário possui a permissão
            if ($user->hasPermission($permission)) {
                return $next($request);
            }
        }

        // Se não tiver permissão, redireciona para uma página de erro
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar essa página.');
    }
}