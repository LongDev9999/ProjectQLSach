<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkdangnhap
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
        
        if (Auth::guest()) //nếu CHƯA đăng nhập==>chuyển về trang ĐN
        {
             return redirect('dangnhap');
        }
        return $next($request);//NGƯỢC LẠI,thì chạy route
    }

}
