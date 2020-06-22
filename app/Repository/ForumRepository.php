<?php

namespace App\Repository;
use App\ForumModel;
use App\FrasesModel;

class ForumRepository {

    public function __construct(ForumModel $forumModel, FrasesModel $frasesModel){
        $this->frasesModel = $frasesModel;
        $this->forumModel = $forumModel;
    }

    public function validaConteudoRepo($dados){
        $valida = $this->forumModel->buscaConteudo($dados);
        return $valida;
    }
    public function visualizaConteudoRepo($dados){
        $busca = $this->forumModel->buscaConteudo($dados);
        return $busca;
    }

}


?>
