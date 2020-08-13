<?php
    $usuario = session('usuario');
    $sessAvatar = session('avatar');
    $token = session('token');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.header')
    </head>
    <body >
        <form method="POST" id="formApp">
            <input type="hidden" id="tokenusuario" value="{{$token}}" />
            @csrf
        </form>
        @if($usuario != null)
            @include('partials.navbar')
        @endif
        <div class="back-c">
            @if($usuario != null)
            <div class="container float-right">
                @if (session('erro'))
                    <br>
                    <x-alerts.alert type="danger" :message="session('erro')" />
                @endif
                @if (session('success'))
                    <br>
                    <x-alerts.alert type="success" :message="session('success')" />
                @endif
            @endif
                <br>

                @yield('app')
            </div>
        </div>
        <div class="fixed-bottom">
            <footer class="py-3 bg-dark text-white-50 back-footer">
                <div class="container text-center">
                    <x-buttons.button-link  class=" font-c-footer resp-ico">
                        <i class="fas fa-envelope"></i> pablomlima75@gmail.com
                    </x-buttons.button-link>
                    <x-buttons.button-link blank href="http://linkedin.com/in/pablo-machado-lima-42820a194" class=" font-c-footer marg-c-footer" >
                        <i class="fab fa-linkedin"></i>
                    </x-buttons.button-link>
                    <small>Made with <i class="fas fa-heart c-red"></i> By Pablo Machado</small>
                </div>
            </footer>
        </div>
        @include('partials.scripts')
    </body>
</html>
