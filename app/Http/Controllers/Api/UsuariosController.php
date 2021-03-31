<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseObject;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use App\Repository\Api\ValidationRepositoryAPI;
use App\Repository\UsuariosRepository;

class UsuariosController extends Controller{

    public function __construct(
        ValidationRepositoryAPI $validationRepositoryAPI,
        UsuariosRepository $usuariosRepository
    ){
        $this->validationRepositoryAPI = $validationRepositoryAPI;
        $this->usuariosRepository = $usuariosRepository;
    }

    public function store(Request $request){
        $jsonValidate;
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:45',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|max:45|min:5',
            'genre' => 'required|max:20'
        ]);
       // $checkDados = $this->validationRepositoryAPI->checkRequest($validate);
       // if($checkDados->messages != null){
            $dados = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'genre' => $request->genre
            );
            $insereUsuario = $this->usuariosRepository->insereUsuarioRepoApi($dados);
            $jsonValidate = FacadeResponse::json($insereUsuario);
       // }else{
            //$jsonValidate = FacadeResponse::json($checkDados);
       // }

        return $jsonValidate;

    }

}
