<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Auth\AuthController;
use Closure;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(AuthController $authController){
        $this->authController = $authController;
    }
    public function handle($request, Closure $next)
    {
        $sessionAuth = $this->authController->index();
        if($sessionAuth == 0){
            $request->session()->flash('erroLogin', 'Please login again');
            return redirect('/login');
        }
        return $next($request);
    }
}
