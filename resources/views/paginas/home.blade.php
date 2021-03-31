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
                @foreach($cards as  $pos => $key)
                    <x-cards.card classCard="text-white bg-info mb-3 mrg-top-sm wi-sm-card mrg-l-sm" classBody="pad-sm">
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
                                {!! $key->car_texto !!}
                            </div>
                            <div class="collapse colaps-cls" id="tradCars{{$key->cards_id}}">
                                <div class="card card-body c-green pad-sm">
                                    {!! $key->car_traducao !!}
                                </div>
                            </div>
                        </div>
                    </x-cards.card>
                @endforeach
                <div class="j-center d-flex">
                    {{ $cards->links() }}
                </div>
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
                                                classHeader="1" classLabel="text-left f-size-sm" classBody="pad-sm"
                                                 label="{{$key->usu_nome}} - <?php echo date_format(new DateTime($key->for_con_data_cadastro), 'd/m/Y'); ?>">
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
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm"  classBody="pad-sm"
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
                                                    classHeader="b-forum-text " classLabel="text-left f-size-sm"  classBody="pad-sm"
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
                                                classHeader="1" classLabel="text-left f-size-sm" classBody="ph-card-back car-pad pad-sm" 
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
                                            <x-cards.card classCard="text-white bg-primary mb-3 mrg-top-sm wi-sm-card mrg-l-sm" classBody="car-pad pad-sm"
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
            <br>
        </x-form.form-button>
    </x-modal.modal>

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
