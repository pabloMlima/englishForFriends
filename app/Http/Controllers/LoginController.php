<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;
use App\Repository\LoginRepository;
use App\UsuariosModel;
use App\FrasesModel;

class LoginController extends Controller{

    public function __construct(Request $request, LoginModel $loginmodel,
                            LoginRepository $loginrepository, UsuariosModel $usuariosModel,
                            FrasesModel $frasesModel){
        $this->request = $request;
        $this->loginmodel = $loginmodel;
        $this->loginrepository = $loginrepository;
        $this->usuariosModel = $usuariosModel;
        $this->frasesModel = $frasesModel;
    }

    public function index(){
        $sessionForm = $this->request->session()->get('formLogin');
        $email = '';
        $password = '';
        if($sessionForm != null){
            $email = $sessionForm['email'];
            $password = $sessionForm['password'];
        }
        return view('paginas.login', [
            'email' => $email,
            'password' => $password
        ]);
    }
    public function validaLogin(){
        $this->request->validate([
            'email' => 'required|max:45|email:rfc,dns',
            'password' => 'required|min:6|max:45',
        ]);
        $dados = array(
            'email' => $this->request->email,
            'password' => md5($this->request->password),
            'passwordOrigin' => $this->request->password
        );
        $checkLogin = $this->loginmodel->validaUsuario($dados);
        if(count($checkLogin) > 0){
            if($this->request->remember){
                $this->request->session()->put('formLogin', [
                    'email' => $dados['email'],
                    'password' => $dados['passwordOrigin']
                ]);
            }
            $dataAtual = date('Y-m-d');
            $hashToken = md5($checkLogin[0]->usuarios_id.$dataAtual);
            $data = array(
                'usuarios_id' => $checkLogin[0]->usuarios_id,
                'hash' => $hashToken
            );
            $salvaToken = $this->loginmodel->atualizaToken($data);
            $this->request->session()->put('avatar', $checkLogin[0]->usu_avatar);
            $this->request->session()->put('usuario', $checkLogin);
            $this->request->session()->put('token', $hashToken);
            return redirect('/');
        }else{
            $this->request->session()->flash('erroLogin', 'Email or password incorrect');
            return redirect('/login');
        }
    }
    public function listaFrases(){
        $frases = $this->loginrepository->frasesRepo();
        return response()->json($frases);
    }
    public function validFrases(Request $request){
        $text_id = $request->text_id;
        $traducao_id = $request->traducao_id;
        $dados = array(
            'text_id' => $text_id,
            'traducao_id' => $traducao_id
        );

        $validFrase = $this->frasesModel->validFrases($dados);
        $dados = [];
        if(count($validFrase) == 0){
            $dados['message'] = "Incorrect answer";
            $dados['status'] = 0;
        }else{
            $dados['status'] = 1;
        }
        return response()->json($dados);
    }
    public function logout(){
        $this->request->session()->put('usuario', null);
        return redirect('/login');
    }

}
