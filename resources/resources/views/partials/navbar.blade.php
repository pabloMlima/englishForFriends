<?php
    $sessAvatar = session('avatar');
?>
<div class="r-lg">
    <div class="vertical-nav nav-back nav-back w-color " id="sidebar">
        <div class="py-4 px-3 mb-4 nav-backt">
            <div class="media d-flex align-items-center"><img src="{{asset('img/avatar_sys/'.$sessAvatar)}}" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0 w-color">Pablo Machado</h4>
                    <!--p class="font-weight-light mb-0 w-color">Web developer</p-->
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0 w-color">Main</p>

        <ul class="nav flex-column nav-back mb-0">
            <li class="nav-item">
                <a  href="{{action('HomeController@index')}}"  class="nav-link nav-backt w-color">
                <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item w-color ">
                <a type="button" href="{{action('ForumController@index')}}" class="nav-link w-color">
                    <i class="fas fa-list-ul"></i> Forum
                </a>
            </li>
        </ul>
    </div>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="p-4 nav-back">
                <button class="dropdown-item w-color" type="button">Perfil</button>
                <button class="dropdown-item w-color" type="button">Sair</button>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg nav-back mrg-nav-sup r-lg float-right">
            <button class="navbar-toggler w-color" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify w-color"></i>
            </button>
            <!--a class="navbar-brand w-color" href="#">SystEN</a-->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-lg-0">

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <div class="btn-group w-color">
                            <a type="button" class="dropdown-toggle w-color f-menu-nav mrg-b-nav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <x-buttons.button-link modal="profile"> Profile </x-buttons.button-link>
                                <br>
                                <x-buttons.button-link href="{{action('LoginController@logout')}}"> Logout </x-buttons.button-link>
                            </div>
                        </div>
                    </li>
                    <br>
                </ul>
            </div>
        </nav>
    </div>
</div>
