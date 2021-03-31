<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function index(){
        $usuario = $this->request->session()->get('usuario');
        if($usuario == null){
            $status = 0;
        }else{
            $status = 1;
        }
        return $status;
    }
}
