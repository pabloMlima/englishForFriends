<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Api\ValidationRepositoryAPI;
use App\Repository\ForumRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseObject;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;


class ForumController extends Controller
{
    public function __construct(
        ForumRepository $forumRepository,
        ValidationRepositoryAPI $validationRepositoryAPI
       ){
        $this->forumRepository = $forumRepository;
        $this->validationRepositoryAPI = $validationRepositoryAPI;
    }
    public function visualizarTexto(Request $request){
        $jsonValidate;
        $validate = Validator::make($request->all(),[
            'forum_id' => 'required|integer',
        ]);
        $checkDados = $this->validationRepositoryAPI->checkRequest($validate);
        if(count($checkDados->messages) == 0){
            $dados = array(
                'forum_conteudos_id' => $request->forum_id,
            );
            $texto = $this->forumRepository->visualizaConteudoRepo($dados);
            $jsonValidate = FacadeResponse::json($texto);
        }else{
            $jsonValidate = FacadeResponse::json($checkDados);
        }

        return $jsonValidate;

    }
}
