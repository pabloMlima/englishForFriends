<?php
    $usuario = session('usuario');
    $sessAvatar = session('avatar');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.header')
    </head>
    <body >
        <form method="POST" id="formApp">
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
        @include('partials.scripts')
    </body>
</html>
