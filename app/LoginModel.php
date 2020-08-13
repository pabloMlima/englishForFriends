<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    public function validaUsuario($dados){
        $busca = DB::table('usuarios')
                            ->select('usuarios_id', 'usu_nome', 'usu_email', 'usu_avatar')
                            ->where('usu_email', $dados['email'])
                            ->where('usu_senha', $dados['password'])->get();
        return $busca;
    }
    public function atualizaToken($dados){
        $update = DB::table('usuarios')
                            ->where('usuarios_id', $dados['usuarios_id'])
                            ->update([
                                'usu_token' => $dados['hash']
                            ]);
        return $update;
    }

}
