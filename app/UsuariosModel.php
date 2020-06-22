<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    public function verificaConta($dados){
        $busca = DB::table('usuarios')
                            ->where('usu_email', $dados['email'])->get();
        return $busca;
    }
    public function insereUsuario($dados){
        $insere = DB::table('usuarios')
                            ->insertGetId([
                                'usu_nome' => $dados['name'],
                                'usu_email' => $dados['email'],
                                'usu_senha' => $dados['password'],
                                'usu_genero' => $dados['genre'],
                                'usu_avatar' => $dados['avatar']
                            ]);
        return $insere;
    }
    public function listaUsuarios(){
        $busca = DB::table('usuarios')
                            ->select('usu_nome','usu_email','usu_senha','usu_genero', 'usu_avatar')->get();
        return $busca;
    }
    public function editaUsuario($dados){
        $update = DB::table('usuarios')
                            ->where('usuarios_id', $dados['usuarios_id'])
                            ->update([
                                'usu_nome' => $dados['name'],
                                'usu_senha' => $dados['password'],
                                'usu_avatar' => $dados['avatar']
                            ]);
        return $update;
    }
    public function buscaUsuarioId($dados){
        $busca = DB::table('usuarios')
                            ->where('usuarios_id', $dados['usuarios_id'])->get();
        return $busca;
    }
}
