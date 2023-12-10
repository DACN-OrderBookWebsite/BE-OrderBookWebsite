<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect('/');
        }

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra idChucVu
        if ($user->idChucVu === 1) {
            return redirect('/admin');
        } else {
            return redirect('/');
        }
        return $next($request);
    }
}
