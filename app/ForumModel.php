<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    public function insereCardForum($dados){
        $insere = DB::table('forum_conteudos')
                            ->insert([
                                'usuarios_id' => $dados['usuarios_id'],
                                'for_con_texto' => $dados['texto'],
                                'for_con_traducao' => $dados['translation'],
                                'forum_tipos_id' => $dados['tipos'],
                                'for_con_link' => $dados['link'],
                                'for_con_titulo' => $dados['titulo']
                            ]);
        return $insere;
    }
    public function buscaConteudo($dados){
        $busca = DB::table('forum_conteudos AS f_c')
                            ->leftjoin('forum_tipos AS f_t', 'f_c.forum_tipos_id', '=', 'f_t.forum_tipos_id')
                            ->leftjoin('usuarios AS u', 'u.usuarios_id', '=', 'f_c.usuarios_id')
                            ->select('f_c.for_con_texto', 'f_c.for_con_traducao', 'f_c.forum_tipos_id', 'f_c.for_con_link',
                                        'f_c.forum_conteudos_id', 'u.usu_nome', 'u.usuarios_id', 'f_c.for_con_data_cadastro',
                                        'f_c.for_con_titulo')
                            ->where(function($query) use($dados){
                                if((isset($dados['tipos']))&&($dados['tipos'] != null)){
                                    $query->where('f_c.forum_tipos_id', $dados['tipos']);
                                }
                                if((isset($dados['forum_conteudos_id']))&&($dados['forum_conteudos_id'] != null)){
                                    $query->where('f_c.forum_conteudos_id', $dados['forum_conteudos_id']);
                                }
                                if((isset($dados['texto']))&&($dados['texto'] != null)){
                                    $query->where('f_c.for_con_texto', $dados['texto']);
                                }
                                if((isset($dados['link']))&&($dados['link'] != null)){
                                    $query->where('f_c.for_con_link', $dados['link']);
                                }
                                if((isset($dados['titulo']))&&($dados['titulo'] != null)){
                                    $query->where('f_c.for_con_titulo', $dados['titulo']);
                                }
                                if((isset($dados['dataAtual']))&&($dados['dataAtual'] != null)){
                                    $query->where('f_c.for_con_data_cadastro', $dados['dataAtual']);
                                }
                            })->paginate(6);
        return $busca;
    }

}
