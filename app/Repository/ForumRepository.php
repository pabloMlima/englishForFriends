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
        $busca = $this->forumModel->visualizaConteudo($dados);
        return $busca;
    }
    public function adicionaFavoritosRepo($dados){
        $deleteStatus = 0;
        $insereStatus = 0;
        $delete = null;
        $insere = null;
        $buscaFav = $this->forumModel->buscaFavoritos($dados);
        if(count($buscaFav) > 0){
            $delete = $this->forumModel->deleteFavoritos($dados);
        }else{
            $insere = $this->forumModel->insereFavoritos($dados);
        }
        if($insere){
            $insereStatus = 1;
        }
        if($delete){
            $deleteStatus = 1;
        }
        $dados = array(
            'status' => $insereStatus,
            'message' => 'Content successfully added to favorites',
            'data' => null,
            'delete' => $deleteStatus
        );
        return $dados;
    }

}


?>
