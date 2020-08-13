<?php

namespace App\Http\Controllers;
use App\ForumModel;
use Illuminate\Http\Request;
use App\Repository\ForumRepository;

class ForumController extends Controller
{

    public function __construct(
        ForumModel $forummodel,
        ForumRepository $forumRepository,
        Request $request){

        $this->forumRepository = $forumRepository;
        $this->forummodel = $forummodel;
        $this->request = $request;
    }
    public function index(){
        $dataAtual = date('Y-m-d');
        $dados = array(
            'dataAtual' => $dataAtual
        );
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'news',
            'conteudoForum' => $conteudoForum
        ]);
    }
    public function pagCards(){
        $dados['tipos'] = 1;
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'cards',
            'conteudoForum' => $conteudoForum
        ]);
    }
    public function pagYoutube(){
        $dados['tipos'] = 5;
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'youtube',
            'conteudoForum' => $conteudoForum
        ]);
    }
    public function pagTips(){
        $dados['tipos'] = 7;
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'tips',
            'conteudoForum' => $conteudoForum
        ]);
    }
    public function pagPhraVerbs(){
        $dados['tipos'] = 3;
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'phrasalVerbs',
            'conteudoForum' => $conteudoForum
        ]);
    }
    public function pagNews(){
        $dados['dataAtual'] = date('Y-m-d');
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'news',
            'conteudoForum' => $conteudoForum
        ]);
    }

    public function insereConteudo(){
        $usuario = $this->request->session()->get('usuario');
        $titulo = $this->request->title;
        $link = $this->request->link;
        $tipos = $this->request->tipo;
        $texto = $this->request->text;
        $translation = $this->request->translation;
        switch($tipos){
            case 3:
                $redirect = '/forum/phrashal-verbs';
            break;
            case 5:
                $link = str_replace('watch', 'embed', $link);
                $link = str_replace('?', '/', $link);
                $link = str_replace('v=', '', $link);
                $redirect = '/forum/youtube';
            break;
            case 6:
                $max = 30;
                $tam = strlen(strip_tags($texto));
                $titulo = substr(strip_tags($texto), 0, $max - $tam);
                $redirect = '/forum/text';
            break;
            case 7:
                $redirect = '/forum/tips';
            break;

        }
        $dados = array(
            'tipos' => $tipos,
            'link' => $link,
            'titulo' => $titulo,
            'texto' => $texto,
            'translation' => $translation,
            'usuarios_id' => $usuario[0]->usuarios_id,
        );
        $valida = $this->forumRepository->validaConteudoRepo($dados);
        if(count($valida) == 0){
            $insere = $this->forummodel->insereCardForum($dados);
            if($insere){
                $this->request->session()->flash('success', 'Success. Registered video');
            }else{
                $this->request->session()->flash('erro', 'Error. It was not possible to register a video');
            }
        }else{
            $this->request->session()->flash('erro', 'Error. Video already exists');
        }
        return redirect($redirect);
    }
    public function pagText(){
        $dados['tipos'] = 6;
        $conteudoForum = $this->forummodel->buscaConteudo($dados);
        return view('paginas.forum.foruns',[
            'pag' => 'text',
            'conteudoForum' => $conteudoForum
        ]);
    }
    function deletarConteudoForum(){
        $forum_conteudos = $this->request->forum_conteudos;
        $usuario = $this->request->session()->get('usuario');
        $data = array(
                'usuarios_id' => $usuario[0]->usuarios_id,
                'forum_conteudos_id' => $forum_conteudos
        );
        $delete = $this->forummodel->deleteForumConteudos($data);
        if($delete){
            $this->request->session()->flash('success', 'Success. information deleted');
        }else{
            $this->request->session()->flash('erro', 'Error. It was not possible to deleted information');
        }
        return redirect()->back();
    }

}
