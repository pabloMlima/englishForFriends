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
    public function validaToken($token){
        $busca = DB::table('usuarios')
                            ->select('usuarios_id')
                            ->where('usu_token', $token)
                            ->get();
        return $busca;
    }

    public function buscaFavoritosUsuario($dados){
        $busca = DB::table('usuarios_forum_favoritos AS u_f')
                            ->join('forum_conteudos AS f_c', 'u_f.forum_conteudos_id', '=', 'f_c.forum_conteudos_id')
                            ->join('usuarios AS u', 'u.usuarios_id', '=', 'f_c.usuarios_id')
                            ->select('f_c.for_con_texto', 'f_c.for_con_traducao', 'f_c.forum_tipos_id', 'f_c.for_con_link',
                                        'f_c.forum_conteudos_id', 'u.usu_nome', 'u.usuarios_id', 'f_c.for_con_data_cadastro',
                                        'f_c.for_con_titulo', 'u_f.usuarios_forum_favoritos_id')
                            ->where(function($query) use ($dados){
                                if($dados['usuarios_id'] != null){
                                    $query->where('u_f.usuarios_id', $dados['usuarios_id']);
                                }
                                if($dados['tipos_id'] != null){
                                    $query->where('f_c.forum_tipos_id', $dados['tipos_id']);
                                }
                            })->paginate(6);
        return $busca;
    }
    public function deletarFavoritosConteudo($dados){
        $delete = DB::table('usuarios_forum_favoritos')
                            ->where('usuarios_id', $dados['usuarios_id'])
                            ->where('forum_conteudos_id', $dados['favoritos'])
                            ->delete();
        return $delete;
    }
}
