<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if($request->user()->role !== $role){
            if (Auth::guard('admin')->check()) {
            // Optionally redirect if needed
            return redirect()->route('admin.dashboard.index');
            }
            elseif($request->user()->role === 'company'){
                return redirect()->route('company.dashboard');
            }
            elseif($request->user()->role === 'candidate'){
                return redirect()->route('candidate.dashboard');
            }
        }
        return $next($request);
    }
}
