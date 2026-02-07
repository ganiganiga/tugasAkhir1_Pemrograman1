<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in') && !(session('user_logged_in') && session('user_role') === 'admin')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
