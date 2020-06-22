<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UsuariosRepository;
class UsuariosController extends Controller{

    public function __construct(
            Request $request,
            UsuariosRepository $usuariosRepository){
        $this->request = $request;
        $this->usuariosRepository = $usuariosRepository;
    }

    public function updateInfoUsers(){
        $usuario = $this->request->session()->get('usuario');
        $this->request->validate([
            'name' => 'max:45',
            'password' => 'max:45',
        ]);
        $data = array(
            'usuarios_id' => $usuario[0]->usuarios_id
        );
        $dadosUsuario = $this->usuariosRepository->buscaUsuarioRepo($data);
        $avatar = request()->avatar->getClientOriginalName();
        $dataAtual = date('Y-m-d');
        $exData = explode('-', $dataAtual);
        $avatar = $exData[0].$exData[1].$avatar;
        request()->avatar->move(public_path('img/avatar_sys'), $avatar);
        $this->request->session()->put('avatar', $avatar);
        if($this->request->name == null){
            $nome = $dadosUsuario[0]->usu_nome;
        }else{
            $nome = $this->request->name;
        }
        if($this->request->password == null){
            $password = $dadosUsuario[0]->usu_senha;
        }else{
            $password =  md5($this->request->password);
        }

        $dados = array(
            'name' => $nome,
            'password' => $password,
            'usuarios_id' => $usuario[0]->usuarios_id
        );
        $dados['avatar'] = $avatar;
        $update = $this->usuariosRepository->editaUsuarioRepo($dados);
        if($update){
            $this->request->session()->flash('success', 'Success. Updated informations');
        }else{
            $this->request->session()->flash('erro', 'Error. It was not possible to update the information');
        }
        return redirect()->back();
    }
}
