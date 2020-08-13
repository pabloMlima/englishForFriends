@extends('layout.app')
@section('app')
    <div class="d-center">
        <div class="card card-c-l mrg-top-l">
            <div class="card-body">
                @if(session('erroLogin'))
                    <x-alerts.alert type="danger" :message="session('erroLogin')" />
                @endif
                <div class="row justify-content-center">
                    <img  src="{{asset('img/logo.png')}}" />
                </div>
                <x-form.form-button label="Sign In" :action="action('LoginController@validaLogin')" id="login" type="submit">
                    <x-form.text-field value="{{$email}}" label="Email" onchange="checkEmail(this.value)" name="email" type="email" required />
                    <small class="c-red" id="eInvalid" style="display:none;">Email invalid!</small>
                    <x-form.text-field value="{{$password}}" label="Password" name="password" type="password" required />
                    <div class="row">
                        <div class="col-md-4 mrg-l-sm">
                            <x-form.text-checkbox name="remember" value="1">Remember me</x-form.text-checkbox>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="float-left">
                            <x-buttons.button-link class="b-link" modal="new_account">Create new account</x-buttons.button-link>
                        </div>
                    </div>
                </x-form.form-button>
            </div>
        </div>
    </div>

        <!--- MODAL CREATE ACCOUNT -->
        <x-modal.modal modalref="new_account" label="Create new account">
            <x-form.form-button label="Register" btnId="btnRegister" idForm="register" class="primary" function="novoUsuario()" >
                <div id="alertCadastro"></div>
                <div class="row">
                    <div class="col-md-6">
                        <x-form.text-field label="Name" name="name" type="text" required />
                    </div>
                    <div class="col-md-6">
                        <x-form.text-field label="Email" name="email" onchange="checkEmail(this.value)" type="email" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-form.text-field label="Password" name="password" type="password" required />
                    </div>
                    <div class="col-md-6">
                        <x-form.text-field label="Password again" name="passwordagain" onchange="checkPassword(this.value)" type="password" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-form.text-select label="Genre" name="genre" required>
                            <option value="">Selecione</option>
                            <option value="feminine">Feminine</option>
                            <option value="masculine">Masculine</option>
                            <option value="undefined">Undefined</option>
                        </x-form.text-select>
                    </div>
                </div>
                <label> I'm Not a Robot </label>
                <div class="back-questions mrg-l-sm b-radius-sm" id="questionsId"></div>

            </x-form.form-button>
        </x-modal.modal>
        <!-- FIM -->

@endsection
