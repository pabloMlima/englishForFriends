<?php

namespace App\Repository;
use App\UsuariosModel;
use App\Http\Controllers\Api\ResponseObject;
use \Illuminate\Http\Response;

class UsuariosRepository {

    public function __construct(UsuariosModel $usuariosModel){
        $this->usuariosModel = $usuariosModel;
    }
    public function insereUsuarioRepoApi($dados){
        $response = new ResponseObject;
        $response->status = $response::status_ok;
        $response->code = $response::code_ok;

        $verificaConta = $this->usuariosModel->verificaConta($dados);
        if(count($verificaConta) == 0){
            switch($dados['genre']){
                case 'feminine':
                    $dados['avatar'] = 'female.png';
                break;
                case 'masculine':
                    $dados['avatar'] = 'masculine.png';
                break;
                case 'undefined':
                    $dados['avatar'] = 'undefined.jpg';
                break;
            }
            $dados['password'] = md5($dados['password']);
            $novoUsuario = $this->usuariosModel->insereUsuario($dados);
            if($novoUsuario){
                $response->messages[0][0] = 'Successful registration';
                $response->result = '1';
            }else{
                $response->messages = 'Registration error';
                $response->result = '0';
            }
        }else{
            $response->messages[0][0] = 'Registration error. Email already registered';
            $response->result = '0';
        }
        return $response;
    }
    public function editaUsuarioRepo($dados){
        $update = $this->usuariosModel->editaUsuario($dados);
        return $update;
    }
    public function buscaUsuarioRepo($dados){
        $usuario = $this->usuariosModel->buscaUsuarioId($dados);
        $listausuarios = $this->usuariosModel->listaUsuarios();
        $favoritos = $this->usuariosModel->buscaFavoritosUsuario($dados);
        $data = array(
            'usuario' => $usuario,
            'favoritos' => $favoritos,
            'listausuarios' => $listausuarios
        );
        return $data;
    }

}


?>
