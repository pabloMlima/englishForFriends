<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class FrasesModel extends Model
{
    public function listaFrases(){
        $busca = DB::table('validacao_robo_text')->get();
        return $busca;
    }
    public function listaFrasesTrad(){
        $busca = DB::table('validacao_robo_traducao')->get();
        return $busca;
    }
    public function buscaFraseTxt($robo_text_id){
        $busca = DB::table('validacao_robo_text')
                            ->select(
                                'val_rob_tex_frase', 'validacao_robo_text_id'
                            )->where('validacao_robo_text_id', $robo_text_id)->get();
        return $busca;
    }
    public function buscaFraseTrad($validacao_robo_traducao_id){
        $busca = DB::table('validacao_robo_traducao')
                            ->select(
                                'val_rob_tra_mensagem', 'validacao_robo_traducao_id'
                            )->where('validacao_robo_traducao_id', $validacao_robo_traducao_id)->get();
        return $busca;
    }
    public function validFrases($dados){
        $busca = DB::table('validacao_robo_text AS v_tex')
                            ->join('validacao_robo_traducao AS v_tra', 'v_tra.validacao_robo_traducao_id', '=', 'v_tex.validacao_robo_traducao_id')
                            ->where('v_tex.validacao_robo_traducao_id', $dados['traducao_id'])
                            ->where('v_tex.validacao_robo_text_id', $dados['text_id'])->get();
        return $busca;
    }



}
