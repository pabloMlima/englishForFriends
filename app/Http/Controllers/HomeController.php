<?php

namespace App\Http\Controllers;

use App\CardsModel;
use App\UsuariosModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        CardsModel $cardsModel,
        UsuariosModel $usuariosModel){

        $this->cardsModel = $cardsModel;
        $this->usuariosModel  = $usuariosModel;
    }
    public function index(){
        $cards = $this->cardsModel->listaCarsUsuario();
        $usuarios = $this->usuariosModel->listaUsuarios();

        $cardsPublicos = $cards->where('car_publico', 1);
        return view('paginas.home', [
            'cards' => $cards,
            'cardsPublicos' => $cardsPublicos,
            'usuarios' => $usuarios
        ]);
    }
}
