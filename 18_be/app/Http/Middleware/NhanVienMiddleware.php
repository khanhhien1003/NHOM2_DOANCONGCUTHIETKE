<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NhanVienMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        if($tai_khoan_dang_dang_nhap && $tai_khoan_dang_dang_nhap instanceof \App\Models\NhanVien) {
            return $next($request);
        } else {
            return response()->json("Em không biết, anh đi ra đi!");
        }
    }
}
