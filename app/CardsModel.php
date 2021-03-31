<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class CardsModel extends Model{

    public function insereCard($dados){
        $insere = DB::table('cards')
                            ->insert([
                                'usuarios_id' => $dados['usuarios_id'],
                                'car_texto' => $dados['texto'],
                                'car_traducao' => $dados['translation'],
                                'car_publico' => $dados['publico']
                            ]);
        return $insere;
    }
    public function listaCarsUsuario(){
        $busca = DB::table('cards AS c')
                            ->leftjoin('usuarios AS u', 'u.usuarios_id', '=', 'c.usuarios_id')
                            ->select('c.cards_id', 'c.car_texto', 'c.car_traducao', 'c.car_publico',
                                        'u.usu_nome')->paginate(4);
        return $busca;
    }
    public function deletarCardUsuario($dados){
        $delete = DB::table('cards')
                            ->where('cards_id', $dados['card'])
                            ->where('usuarios_id', $dados['usuarios_id'])
                            ->delete();
        return $delete;
    }

}
