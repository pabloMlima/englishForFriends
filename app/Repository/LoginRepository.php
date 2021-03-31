<?php

namespace App\Repository;
use App\LoginModel;
use App\FrasesModel;

class LoginRepository {

    public function __construct(LoginModel $loginModel, FrasesModel $frasesModel){
        $this->loginModel = $loginModel;
        $this->frasesModel = $frasesModel;
    }

    public function frasesRepo(){
        $frasesQues = $this->frasesModel->listaFrases();
        $frasesTrad  = $this->frasesModel->listaFrasesTrad();
        $randFrasesQues = array_rand($frasesQues->toArray(), 1);
        $randFrasesTrad = array_rand($frasesTrad->toArray(), 3);
        $fraseQ = $frasesQues[$randFrasesQues];
        $frasesAux = array();
        $formatAux = [];
        $respostaQ  = $this->frasesModel->buscaFraseTrad($fraseQ->validacao_robo_traducao_id);
        foreach($randFrasesTrad as $key){
            $fraseAux = $frasesQues[$key];
            $respAux = $this->frasesModel->buscaFraseTrad($fraseAux->validacao_robo_traducao_id);
            array_push($frasesAux, $respAux);
        }
        foreach($frasesAux as $key){
            array_push($formatAux, $key[0]);
        }
        $formatAux = collect($formatAux);
        $respostaQ = collect($respostaQ);
        $questao = $this->frasesModel->buscaFraseTxt($fraseQ->validacao_robo_text_id);
        $mergeFrases = $formatAux->merge($respostaQ)->sortBy('validacao_robo_traducao_id');
        $vetMerge = [];
        foreach($mergeFrases as $key){
            array_push($vetMerge, $key);
        }
        $dados = array(
            'questao' => $questao,
            'opcaoRespostas' => $vetMerge
        );

        return $dados;
    }
}


?>
