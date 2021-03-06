@extends('layout.app')

@section('app')
<?php
  $messageEr = 'Error! It was not possible to register.';
  $messageSuc = 'Success! Flashcard registered.';
  $sessAvatar = session('avatar');
?>
<div class="container mrg-n-dash div-calc">
    <x-cards.card label="Dashboard" classHeader="back-header" classCard=" card-respons">
        <x-cards.card classBody="p-sm">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="f-menu-nav">My cards</h4>
                </div>
                <div class="col-md-2">
                    <x-buttons.button-link function="showCards()" class="btn-primary btn-sm float-right "> <i class="fas fa-angle-down w-color"></i></x-buttons.button-link>
                    <x-buttons.button-link modal="notes" class="btn-info btn-sm float-right mrg-r-sm"> <i class="fas fa-plus w-color"></i></x-buttons.button-link>
                </div>
            </div>
            <div class="row scroll-news j-center" id="myCards" style="display: none;">
                @foreach($cards as $key)
                    <x-cards.card classCard="text-white bg-info mb-3 mrg-top-sm wi-sm-card mrg-l-sm">
                        <div class="row j-center">
                            <div class="col-md-12">
                                <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->cards_id}}" role="button" aria-expanded="false">
                                    <div class="div-btn-res">
                                        <i class="far fa-eye"></i>
                                    </div>
                                </a>
                                <x-form.simple-form :action="action('CardsController@deletarCardUsuario')">
                                    <input type="hidden" name="card" value="{{$key->cards_id}}" />
                                    <x-buttons.button-save type="submit" >
                                        <i class="fas fa-times r-color" id="fav{{$key->cards_id}}"></i>
                                    </x-buttons.button-save>
                                </x-form.simple-form>
                                <br>
                                {!! $key->car_texto !!}
                            </div>
                            <div class="collapse" id="tradCars{{$key->cards_id}}">
                                <div class="card card-body c-green">
                                    {!! $key->car_traducao !!}
                                </div>
                            </div>
                        </div>
                    </x-cards.card>
                @endforeach
            </div>
            </x-cards.card>
            <br>
                <x-cards.card classBody="p-sm">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="f-menu-nav">Favorites</h4>
                        </div>
                        <div class="col-md-2">
                            <x-buttons.button-link function="showFavoritesHome()" class="btn-primary btn-sm float-right "> <i class="fas fa-angle-down w-color"></i></x-buttons.button-link>
                        </div>
                    </div>
                    <div class="row scroll-news " id="myFavoritesHome"  @if(isset($pag)) style="display: block;" @else style="display: none;" @endif>
                        <div class="row r-lg">
                        <div class="col-md-3 neg-mrg-l">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action @if($pag == 'cards') active @endif" id="list-profile-list"
                                    href="{{action('UsuariosController@favoritos', ['tipo' => 1])}}" role="tab" aria-controls="profile">
                                    Cards
                                </a>
                                <a class="list-group-item list-group-item-action @if($pag == 'phrasalVerbs') active @endif" id="list-settings-list"
                                    href="{{action('UsuariosController@favoritos', ['tipo' => 3])}}" role="tab" aria-controls="settings">
                                    Phrasal verbs
                                </a>
                                <a type="button" class="list-group-item list-group-item-action @if($pag == 'youtube') active @endif" id="list-settings-list"
                                    href="{{action('UsuariosController@favoritos', ['tipo' => 5])}}" role="tab" aria-controls="settings">
                                    Youtube
                                </a>
                                <a class="list-group-item list-group-item-action @if($pag == 'text') active @endif" id="list-settings-list"
                                    href="{{action('UsuariosController@favoritos', ['tipo' => 6])}}" role="tab" aria-controls="settings">
                                    Text
                                </a>
                                <a class="list-group-item list-group-item-action @if($pag == 'tips') active @endif" id="list-settings-list"
                                    href="{{action('UsuariosController@favoritos', ['tipo' => 7])}}" role="tab" aria-controls="settings">
                                    Tips
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            @if(isset($pag))
                                @if($pag == 'cards')
                                    <div class="row scroll-forum" >
                                        @foreach($favoritos as $pos => $key)
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                                classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                                <div class="row j-center">
                                                    <div class="col-md-12">
                                                        <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->forum_conteudos_id}}" role="button" aria-expanded="false">
                                                            <div class="div-btn-res">
                                                                <i class="far fa-eye" ></i>
                                                            </div>
                                                        </a>
                                                        <br>
                                                        {!! $key->for_con_texto !!}
                                                    </div>
                                                    <div class="div-right">
                                                        <x-form.simple-form :action="action('UsuariosController@deleteFavoritos')">
                                                            <input type="hidden" name="favoritos" value="{{$key->forum_conteudos_id}}" />
                                                            <x-buttons.button-save type="submit" >
                                                                <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                            </x-buttons.button-save>
                                                        </x-form.simple-form>
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
                                    <div class="row scroll-forum" >
                                        @foreach($favoritos as $pos => $key)
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                                classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                                <div class="row j-center">
                                                    <div class="col-md-12">
                                                        {!! $key->for_con_titulo !!}
                                                        <a class="float-right" type="button"
                                                            data-toggle="modal" data-target="#showVideo{{$key->forum_conteudos_id}}"
                                                            onclick="visualizarVideo('{{$key->for_con_link}}','{{$key->forum_conteudos_id}}')">
                                                            <div class="div-btn-res">
                                                                <i class="far fa-eye"></i>
                                                            </div>
                                                            <br>
                                                        </a>
                                                    </div>
                                                    <div class="div-right">
                                                        <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                            <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
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
                                    <div class="row scroll-forum" >
                                        @foreach($favoritos as $pos => $key)
                                            <x-cards.card classCard="text-white mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                                    classHeader="b-forum-text " classLabel="text-left f-size-sm"
                                                    label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                                <div class="row j-center c-white">
                                                    <div class="col-md-12">
                                                        <a href="#" onclick="visualizarText('{{$key->forum_conteudos_id}}')" data-toggle="modal" data-target="#viewText" aria-expanded="false">
                                                            <div class="div-btn-res">
                                                                <i class="far fa-eye"></i>
                                                            </div>
                                                        </a>
                                                        <br>
                                                        <p class="c-black">{!! $key->for_con_titulo !!}...</p>
                                                    </div>
                                                    <div class="div-right">
                                                        <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                            <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                        </x-buttons.button-link>
                                                    </div>
                                                </div>
                                            </x-cards.card>
                                        @endforeach
                                    </div>
                                @endif
                                @if($pag == 'phrasalVerbs')
                                    <div class="row scroll-forum" >
                                        @foreach($favoritos as $pos => $key)
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"
                                                classHeader="1" classLabel="text-left f-size-sm" classBody="ph-card-back car-pad"
                                                label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                                <div class="row j-center">
                                                    <div class="col-md-12">
                                                        <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->forum_conteudos_id}}" role="button" aria-expanded="false">
                                                            <div class="div-btn-res">
                                                                <i class="far fa-eye"></i>
                                                            </div>
                                                        </a>
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
                                                            <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                        </x-buttons.button-link>
                                                    </div>
                                                </div>
                                            </x-cards.card>
                                        @endforeach
                                    </div>
                                @endif
                                @if($pag == 'tips')
                                    <div class="row scroll-forum" >
                                        @foreach($favoritos as $key)
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm" classBody="car-pad"
                                                classHeader="1" classLabel="text-left f-size-sm" label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
                                                <div class="row j-center">
                                                    <div class="col-md-12">
                                                        <br>
                                                        {!! $key->for_con_texto !!}
                                                    </div>
                                                    <div class="div-right">
                                                        <x-buttons.button-link function="adicionarFavoritos('{{$key->forum_conteudos_id}}')">
                                                            <i class="fas fa-times r-color" id="fav{{$key->forum_conteudos_id}}"></i>
                                                        </x-buttons.button-link>
                                                    </div>
                                                </div>
                                            </x-cards.card>
                                        @endforeach
                                    </div>
                                @endif
                                @if((isset($favoritos))&&(count($favoritos) > 0))
                                    <div class="j-center d-flex">
                                        {{ $favoritos->links() }}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </x-cards.card>
        </x-cards.card>
    </div>

    <!--div class="row mrg-top-sm">
        <div class="col-md-8">
            <x-cards.card label="Dashboard" classHeader="back-header">
                <div class="row j-center">
                    <a href="#" onclick="newYorkTimes()" type="button" class="mrg-sm-l">
                        <div class="div-m back-d-news">
                            <img src="{{asset('img/news.png')}}" class="img-m">
                        </div>
                    </a>

                    <a href="#" onclick="showCards()" type="button" class="mrg-sm-l">
                        <div class="div-m back-d-text">
                            <img src="{{asset('img/text.png')}}" class="img-m">
                        </div>
                    </a>

                    <a href="#" onclick="cardsPublicos()" type="button" class="mrg-sm-l">
                        <div class="div-m back-d-share">
                            <img src="{{asset('img/share.png')}}" class="img-m">
                        </div>
                    </a>
                </div>
                <div class="row scroll-news" id="newsId" style="display: none;"> </div>
                <div class="row scroll-news" id="cardsDiv" style="display: none;">
                <br>
                    @foreach($cards as $key)
                        <x-cards.card classCard="text-white bg-info mb-3 mrg-top-sm wi-sm-card mrg-l-sm">
                            <div class="row j-center">
                                <div class="col-md-12">
                                    <a aria-controls="multiCollapseExample1" data-toggle="collapse" href="#tradCars{{$key->cards_id}}" role="button" aria-expanded="false">
                                        <div class="div-btn-res">
                                            <i class="far fa-eye"></i>
                                        </div>
                                    </a>
                                    <br>
                                    {!! $key->car_texto !!}
                                </div>
                                <div class="collapse" id="tradCars{{$key->cards_id}}">
                                    <div class="card card-body c-green">
                                        {!! $key->car_traducao !!}
                                    </div>
                                </div>
                            </div>
                        </x-cards.card>
                    @endforeach
                </div>
            </div>
            <div class="row scroll-news mr-neg" id="cardsPublic" style="display: none;">
                <br>
                    @foreach($usuarios as $key)
                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-p-nav"  src="{{asset('img/avatar_sys/'.$key->usu_avatar)}}" />
                                    </div>
                                    <div class="col-md-9">
                                        {{$key->usu_nome}}
                                    </div>
                                </div>
                            </x-cards.card>
                    @endforeach
            </div>
        </x-cards.card>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header back-header">
                    <div class="row">
                        <div class="col-md-10 f-header-t w-color"> New flashcards </div>
                        <div class="col-md-2">
                            <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#notes">
                            <i class="fas fa-plus w-color"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Isto é um texto dentro de um card.
                </div>
            </div>
        </div>

    </div-->

    <x-modal.modal modalref="notes" label="New flashcards">
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
            <div class="row">
                <div class="col-md-4 mrg-l-sm">
                    <x-form.text-checkbox  name="public" value="1" >Public</x-form.text-checkbox>
                </div>
            </div>
            <br>
        </x-form.form-button>
    </x-modal.modal>




<!-- MODAL ADD NOTE -->
<!--div class="modal fade" id="notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New flashcards</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div style="display: none;" id="successCard">
                <x-alerts.alert type="success" :message="$messageSuc"  />
            </div>
            <div style="display: none;" id="errorCard" >
                <x-alerts.alert type="danger" :message="$messageEr" />
            </div>
        <form id="formCard" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <label >Text</label>
                    <a type="button" class="btn btn-primary btn-sm float-right neg-mrg-l" onclick="opImg()"><i class="fas fa-images w-color"></i></a>

                    <textarea id="areaText" class="form-control" name="texto"  rows="3"></textarea>
                </div>
            </div><br>

            <div class="row mrg-l-pr " id="opImgOrg" style="display:none;">
                <label class="file">
                    <input type="file" id="img" name="img" aria-label="File browser example">
                    <span class="file-custom"></span>
                </label>
                <img class="img-pr img-p" id="imgpreview" src="#" alt="your image" style="display: none" />
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label>Translation</label>
                    <a type="button" class="btn btn-info btn-sm float-right neg-mrg-l" onclick="opImgTranslation()"><i class="fas fa-images w-color"></i></a>
                    <textarea class="form-control" id="areaTextTansl" name="translation" rows="3"></textarea>
                </div>
            </div>

            <div class="row mrg-l-pr " id="opImgOrgTransl" style="display:none;">
                <label class="file">
                    <input type="file" id="imgTranslation" name="imgTranslation" aria-label="File browser example">
                    <span class="file-custom"></span>
                </label>
                <img class="img-pr img-p" id="imgtranslpreview" src="#" alt="your image" style="display: none" />
            </div>

            <div class="row mrg-l-pr">
                Public <input type="checkbox" class="i-check " name="publico" value="1" />
            </div>
        </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="novoCard()">Save changes</button>
            </div>
        </div>
    </div>
</div-->


<!--- MODAL PROFILE  -->
    <x-modal.modal modalref="profile" label="My Profile">
        <x-form.form-button type="submit" label="Save changes" :action="action('UsuariosController@updateInfoUsers')" >
            <div class="row">
                <div class="col-md-2">
                    <img class="img-p-nav" id="imgAvatarPreview" src="#" style="display: none" />
                    <img class="img-p-nav" src="{{asset('img/avatar_sys/'.$sessAvatar)}}" id="imgDefaultAvatar" />
                </div>
                <div class="col-md-4">
                    <x-form.text-field type="file" name="avatar" label="Change Avatar"></x-form.text-field>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <x-form.text-field label="Name" name="name" type="text"  />
                </div>
                <div class="col-md-6">
                    <x-form.text-field label="Password" name="password" type="password"  />
                </div>
            </div>
        </x-form.form-button>
    </x-modal.modal>


@endsection
