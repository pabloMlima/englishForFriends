<?php

namespace App\Repository\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseObject;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;
use App\UsuariosModel;

class ValidationRepositoryAPI {

    public function __construct(UsuariosModel $usuariosModel){
        $this->usuariosModel = $usuariosModel;
    }

    public function checkRequest($validate, $token = null){
        $response = new ResponseObject;
        if($validate->fails()){
            $response->status = $response::status_failed;
            $response->code = $response::code_failed;
            foreach ($validate->errors()->getMessages() as $item) {
                array_push($response->messages, $item);
            }
        }else{
            $validaToken = $this->usuariosModel->validaToken($token);
            if(count($validaToken) > 0){
                $response->status = $response::status_ok;
                $response->code = $response::code_ok;
            }else{
                $response->status = $response::code_unauthorized;
                $response->messages = 'you do not have permission';
            }
        }
        return $response;
    }
}


?>
