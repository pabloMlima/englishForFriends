@extends('layout.app')
@section('app')

<?php
  $messageEr = 'Error! It was not possible to register.';
  $messageSuc = 'Success! Flashcard registered.';
  $sessUsuario = session('usuario');
?>

<div class="container mrg-n-dash div-calc">
    <x-cards.card label="Forum" classHeader="back-header" classCard=" card-respons">
        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action @if($pag == 'news') active @endif" id="list-home-list"
                             href="{{action('ForumController@pagNews')}}" >
                            News
                        </a>
                        <a class="list-group-item list-group-item-action @if($pag == 'cards') active @endif" id="list-profile-list"
                             href="{{url('/forum/cards')}}" role="tab" aria-controls="profile">
                            Cards
                        </a>
                        <a class="list-group-item list-group-item-action @if($pag == 'phrasalVerbs') active @endif" id="list-settings-list"
                             href="{{action('ForumController@pagPhraVerbs')}}" role="tab" aria-controls="settings">
                            Phrasal verbs
                        </a>
                        <a type="button" class="list-group-item list-group-item-action @if($pag == 'youtube') active @endif" id="list-settings-list"
                            href="{{action('ForumController@pagYoutube')}}" role="tab" aria-controls="settings">
                            Youtube
                        </a>
                        <a class="list-group-item list-group-item-action @if($pag == 'text') active @endif" id="list-settings-list"
                            href="{{action('ForumController@pagText')}}" role="tab" aria-controls="settings">
                            Text
                        </a>
                        <a class="list-group-item list-group-item-action @if($pag == 'tips') active @endif" id="list-settings-list"
                             href="{{action('ForumController@pagTips')}}" role="tab" aria-controls="settings">
                           Tips
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    @if(isset($pag))
                        @if($pag == 'news')
                        <div class="row">
                                <div class="col-md-10">
                                    <h3>News </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newCardsForum" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @if(count($conteudoForum) > 0)
                                    @foreach($conteudoForum as $pos => $key)
                                        <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                            classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                            <div class="row j-center">
                                                <div class="col-md-12">
                                                    <div class="mrg-c-delete">
                                                        <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->forum_conteudos_id}}" role="button" aria-expanded="false">
                                                            <div class="div-btn-res">
                                                                <i class="far fa-eye"></i>
                                                            </div>
                                                        </a>
                                                        @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                            <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                                <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                                <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                    <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                                </x-buttons.button-save>
                                                            </x-form.simple-form>
                                                        @endif
                                                    </div>
                                                    <br>
                                                    {!! $key->for_con_texto !!}

                                                </div>
                                                <div class="div-right">
                                                    <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                        <i class="fas fa-star" id="fav'{{$key->forum_conteudos_id}}'"></i>
                                                    </x-buttons.button-link>
                                                </div>
                                            </div>
                                            <div class="collapse" id="tradCars{{$key->forum_conteudos_id}}">
                                                <div class="card card-body c-green">
                                                    {!! $key->for_con_traducao !!}
                                                </div>
                                            </div>
                                        </x-cards.card>
                                    @endforeach
                                @else
                                No recent activity
                                @endif
                            </div>
                        @endif
                        @if($pag == 'cards')
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Cards </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newCardsForum" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @foreach($conteudoForum as $pos => $key)
                                    <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                        classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                        <div class="row j-center">
                                            <div class="col-md-12">
                                                <div class="mrg-c-delete">
                                                    <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->forum_conteudos_id}}" role="button" aria-expanded="false">
                                                        <div class="div-btn-res">
                                                            <i class="far fa-eye" ></i>
                                                        </div>
                                                    </a>
                                                    @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                        <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                            <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
                                                    @endif
                                                </div>
                                                <br>
                                                {!! $key->for_con_texto !!}

                                            </div>
                                            <div class="div-right">
                                                <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                    <i class="fas fa-star w-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                </x-buttons.button-link>
                                            </div>
                                        </div>
                                        <div class="collapse" id="tradCars{{$key->forum_conteudos_id}}">
                                            <div class="card card-body c-green">
                                                {!! $key->for_con_traducao !!}
                                            </div>
                                        </div>
                                    </x-cards.card>
                                @endforeach
                            </div>
                        @endif
                        @if($pag == 'youtube')
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Youtube </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newYoutube" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @foreach($conteudoForum as $pos => $key)
                                    <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                        classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                        <div class="row j-center">
                                            <div class="col-md-12">
                                                <div class="mrg-c-delete">
                                                    <a class="float-right" type="button"
                                                        data-toggle="modal" data-target="#showVideo{{$key->forum_conteudos_id}}"
                                                        onclick="visualizarVideo('{{$key->for_con_link}}','{{$key->forum_conteudos_id}}')">
                                                        <div class="div-btn-res">
                                                            <i class="far fa-eye"></i>
                                                        </div>
                                                        <br>
                                                    </a>
                                                    @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                        <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                            <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
                                                    @endif
                                                </div>
                                                {!! $key->for_con_titulo !!}
                                            </div>
                                            <div class="div-right">
                                                <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                    <i class="fas fa-star w-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                </x-buttons.button-link>
                                            </div>
                                        </div>
                                    </x-cards.card>
                                    <x-modal.modal function="stopVideo()" classDialog="modal-lg" modalref="showVideo{{$key->forum_conteudos_id}}" label="{{$key->for_con_titulo}}">
                                        <div class="row" id="frameYoutube{{$key->forum_conteudos_id}}">

                                        </div>
                                    </x-modal.modal>
                                @endforeach
                            </div>
                        @endif
                        @if($pag == 'text')
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Text </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newTextForum" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @foreach($conteudoForum as $pos => $key)
                                    <x-cards.card classCard="text-white mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                            classHeader="b-forum-text " classLabel="text-left f-size-sm"
                                            label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                        <div class="row j-center c-white">
                                            <div class="col-md-12">
                                                <div class="mrg-c-delete">
                                                    <a href="#" onclick="visualizarText('{{$key->forum_conteudos_id}}')" data-toggle="modal" data-target="#viewText" aria-expanded="false">
                                                        <div class="div-btn-res">
                                                            <i class="far fa-eye"></i>
                                                        </div>
                                                    </a>
                                                    @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                        <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                            <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
                                                    @endif
                                                </div>
                                                <br>
                                                <p class="c-black">{!! $key->for_con_titulo !!}...</p>
                                            </div>
                                            <div class="div-right">
                                                <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                    <i class="fas fa-star w-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                </x-buttons.button-link>
                                            </div>
                                        </div>
                                    </x-cards.card>
                                @endforeach
                            </div>
                        @endif
                        @if($pag == 'phrasalVerbs')
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Phrasal Verbs </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newPhaorum" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @foreach($conteudoForum as $pos => $key)
                                    <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                        classHeader="1" classLabel="text-left f-size-sm" classBody="ph-card-back car-pad"
                                        label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                        <div class="row j-center">
                                            <div class="col-md-12">
                                                <div>
                                                    <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->forum_conteudos_id}}" role="button" aria-expanded="false">
                                                        <div class="div-btn-res">
                                                            <i class="far fa-eye"></i>
                                                        </div>
                                                    </a>
                                                    @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                        <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                            <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
                                                    @endif
                                                </div>
                                                <br>
                                                {!! $key->for_con_texto !!}
                                            </div>
                                            <div class="collapse" id="tradCars{{$key->forum_conteudos_id}}">
                                                <div class="card card-body c-green">
                                                    {!! $key->for_con_traducao !!}
                                                </div>
                                            </div>
                                            <div class="div-right">
                                                <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                    <i class="fas fa-star w-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                </x-buttons.button-link>
                                            </div>
                                        </div>
                                    </x-cards.card>
                                @endforeach
                            </div>
                        @endif
                        @if($pag == 'tips')
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>Tips </h3>
                                </div>
                                <div class="col-md-2">
                                    <x-buttons.button-link modal="newTipsForum" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                                </div>
                            </div>
                            <div class="row scroll-forum" >
                                @foreach($conteudoForum as $key)
                                    <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm" classBody="car-pad"
                                        classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                        <div class="row j-center">
                                            <div class="col-md-12">
                                                <div class="mrg-c-delete">
                                                    @if($key->usuarios_id == $sessUsuario[0]->usuarios_id)
                                                        <x-form.simple-form :action="action('ForumController@deletarConteudoForum')">
                                                            <input type="hidden" name="forum_conteudos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" class=" mrg-b-top-n">
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
                                                    @endif
                                                </div>
                                                <br>
                                                {!! $key->for_con_texto !!}
                                            </div>
                                            <div class="div-right">
                                                <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                    <i class="fas fa-star w-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                </x-buttons.button-link>
                                            </div>
                                        </div>
                                    </x-cards.card>
                                @endforeach
                            </div>
                        @endif
                        <div class="j-center d-flex">
                            {{ $conteudoForum->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-cards.card>
</div>

<!-- MODAL CARD -->
<x-modal.modal modalref="newCardsForum" label="New Card">
    <div style="display: none;" id="successCard">
        <x-alerts.alert type="success" :message="$messageSuc"  />
    </div>
    <div style="display: none;" id="errorCard" >
        <x-alerts.alert type="danger" :message="$messageEr" />
    </div>
    <x-form.form-button label="Save" type="submit" idForm="formCard" :action="action('CardsController@store')">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Text:</label>
                <textarea id="text" name="text" > </textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label>translation:</label>
                <textarea id="translation" name="translation" type="text" > </textarea>
            </div>
        </div>
        <input type="hidden" name="tipo" value="1" />
    </x-form.form-button>
</x-modal.modal>
<!-- FIM MODAL -->

<!-- MODAL TEXT -->
<x-modal.modal modalref="newTextForum" label="New Text" classDialog="modal-lg">
    <div style="display: none;" id="successCard">
        <x-alerts.alert type="success" :message="$messageSuc"  />
    </div>
    <div style="display: none;" id="errorCard" >
        <x-alerts.alert type="danger" :message="$messageEr" />
    </div>
    <x-form.form-button label="Save" type="submit" idForm="formCard" :action="action('ForumController@insereConteudo')">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Text:</label>
                <textarea id="textForum" name="text" > </textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label>translation:</label>
                <textarea id="translationForum" name="translation" type="text" > </textarea>
            </div>
        </div>
        <input type="hidden" name="tipo" value="6" />
    </x-form.form-button>
</x-modal.modal>
<!-- FIM MODAL -->

<!-- MODAL YOUTUBE -->
<x-modal.modal modalref="newYoutube" label="New Video">
    <div style="display: none;" id="successCard">
        <x-alerts.alert type="success" :message="$messageSuc"  />
    </div>
    <div style="display: none;" id="errorCard" >
        <x-alerts.alert type="danger" :message="$messageEr" />
    </div>
    <x-form.form-button label="Save" type="submit" idForm="formCard" :action="action('ForumController@insereConteudo')">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <x-form.text-field label="Title" name="title" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-form.text-field label="Link" name="link" />
            </div>
        </div>
        <input type="hidden" name="tipo" value="5" />
    </x-form.form-button>
</x-modal.modal>
<!-- FIM MODAL -->

<!-- MODAL TEXT -->
<x-modal.modal modalref="viewText" classDialog="modal-lg" label="View Text">
    <div class="row scro-text-for j-center">
        <div class="col-md-11 bor-blue" id="textV">

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <x-buttons.button-link function="showTranslateForum()" class="float-right">
                <div class="div-btn-res">
                    <i class="far fa-eye"></i>
                </div>
            </x-buttons.button-link>
        </div>
    </div>
    <br>
    <div class="row scro-text-for j-center" id="translateDiv" style="display: none">
        <div class="col-md-11 bor-green" id="translateV">

        </div>
    </div>
</x-modal.modal>
<!-- FIM MODAL -->

<!-- MODAL PHRASAL VERBS -->
<x-modal.modal modalref="newPhaorum" label="New Phrasal Verbs">
    <x-form.form-button label="Save" type="submit" idForm="formCard" :action="action('ForumController@insereConteudo')">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Text:</label>
                <textarea id="textPhaForum" name="text" > </textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label>translation:</label>
                <textarea id="translationPhaForum" name="translation" type="text" > </textarea>
            </div>
        </div>
        <input type="hidden" name="tipo" value="3" />
    </x-form.form-button>
</x-modal.modal>
<!-- FIM MODAL -->

<!-- MODAL CARD -->
<x-modal.modal modalref="newTipsForum" label="New Tips">
    <x-form.form-button label="Save" type="submit" idForm="formCard" :action="action('ForumController@insereConteudo')">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <label>Tip:</label>
                <textarea id="tips" name="text" > </textarea>
            </div>
        </div>
        <input type="hidden" name="tipo" value="7" />
    </x-form.form-button>
</x-modal.modal>
<!-- FIM MODAL -->

@endsection
