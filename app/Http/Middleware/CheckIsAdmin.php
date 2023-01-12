<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Kiểm tra có phải là admin ko
            $user = Auth::user();
            if ($user -> levels == 0) {
                return redirect('/')->with('permissionDenied', 'Bạn không có quyền truy cập');
            }
        } else {
            return redirect('/')->with('permissionDenied', 'Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}
