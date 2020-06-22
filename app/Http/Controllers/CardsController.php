<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardsModel;
use App\ForumModel;

class CardsController extends Controller
{
    public function __construct(
        CardsModel $cardsmodel,
        ForumModel $forummodel,
        Request $request
    ){
        $this->cardsmodel = $cardsmodel;
        $this->request = $request;
        $this->forummodel = $forummodel;
    }


    public function store(){
        $usuario = $this->request->session()->get('usuario');
        $texto = $this->request->text;
        $tipos = $this->request->tipo;
        $translation = $this->request->translation;
        $publico = $this->request->public;

        $dados = array(
            'usuarios_id' => $usuario[0]->usuarios_id,
            'texto' => $texto,
            'translation' => $translation,
            'publico' => $publico,
            'tipos' => $tipos,
            'link' => NULL,
            'titulo' => NULL
        );

        switch($tipos){
            case null:
                $insere = $this->cardsmodel->insereCard($dados);
                $redirect = '/';
            break;
            case 1:
                $insere = $this->forummodel->insereCardForum($dados);
                $redirect = '/forum/cards';
            break;

        }
        if($insere){
            $this->request->session()->flash('success', 'Success. Registered card');
        }else{
            $this->request->session()->flash('erro', 'Error. It was not possible to register a card');
        }
        return redirect($redirect);
    }

}
