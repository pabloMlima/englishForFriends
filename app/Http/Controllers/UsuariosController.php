<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CardsModel;
use App\Repository\UsuariosRepository;
use App\UsuariosModel;

class UsuariosController extends Controller{

    public function __construct(
            Request $request,
            CardsModel $cardsModel,
            UsuariosModel $usuariosModel,
            UsuariosRepository $usuariosRepository){
        $this->request = $request;
        $this->cardsModel = $cardsModel;
        $this->usuariosRepository = $usuariosRepository;
        $this->usuariosModel = $usuariosModel;
    }

    public function updateInfoUsers(){
        $usuario = $this->request->session()->get('usuario');
        $this->request->validate([
            'name' => 'max:45',
            'password' => 'max:45',
        ]);
        $data = array(
            'usuarios_id' => $usuario[0]->usuarios_id,
            'tipos_id' => null
        );
        $dadosUsuario = $this->usuariosRepository->buscaUsuarioRepo($data);
        $dadosUsuario = $dadosUsuario['usuario'];
        if(isset($request->avatar)){
            $avatar = request()->avatar->getClientOriginalName();
            $dataAtual = date('Y-m-d');
            $exData = explode('-', $dataAtual);
            $avatar = $exData[0].$exData[1].$avatar;
            request()->avatar->move(public_path('img/avatar_sys'), $avatar);
            $this->request->session()->put('avatar', $avatar);
        }else{
            $avatar = $dadosUsuario[0]->usu_avatar;
        }
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
            $dadosUsuario = $this->usuariosRepository->buscaUsuarioRepo($data);
            $this->request->session()->put('usuario', $dadosUsuario['usuario']);
            $this->request->session()->put('avatar', $dadosUsuario['usuario'][0]->usu_avatar);
            $this->request->session()->flash('success', 'Success. Updated informations');
        }else{
            $this->request->session()->flash('erro', 'Error. It was not possible to update the information');
        }
        return redirect()->back();
    }
    public function favoritos($tipos){
        $cards = $this->cardsModel->listaCarsUsuario();
        $usuario = $this->request->session()->get('usuario');
        $data = array(
                'usuarios_id' => $usuario[0]->usuarios_id,
                'tipos_id' => $tipos
        );
        switch($tipos){
            case 1:
                $pag = 'cards';
            break;
            case 3:
                $pag = 'phrasalVerbs';
            break;
            case 5:
                $pag = 'youtube';
            break;
            case 6:
                $pag = 'text';
            break;
            case 7:
                $pag = 'tips';
            break;
            default:
                $pag = 1;
        break;
        }
        $dadosUsuario = $this->usuariosRepository->buscaUsuarioRepo($data);
        return view('paginas.home', [
            'favoritos' => $dadosUsuario['favoritos'],
            'cards' => $cards,
            'pag' => $pag,
            'usuarios' => $dadosUsuario['listausuarios'],
        ]);
    }
    public function deleteFavoritos(Request $request){
        $favoritos = $request->favoritos;
        $usuario = $this->request->session()->get('usuario');
        $data = array(
                'usuarios_id' => $usuario[0]->usuarios_id,
                'favoritos' => $favoritos
        );
        $deleteFavoritos = $this->usuariosModel->deletarFavoritosConteudo($data);
        if($deleteFavoritos){
            $this->request->session()->flash('success', 'Success. Deleted favorite');
        }else{
            $this->request->session()->flash('erro', 'Error. It was not possible to deleted favorite');
        }
        return redirect()->back();
    }
}
