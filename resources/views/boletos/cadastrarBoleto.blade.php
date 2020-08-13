@extends('layouts.app') 

@section('content')

<!-- page content -->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cadastrar credenciais</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Smart Wizard -->
                <form class="form-horizontal form-label-left" method="POST" action="{{Action('CredenciaisController@insereCredenciais') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Beneficiario*</label>
                                <input type="text" class="form-control" name="beneficiario" require>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">CPF/CNPJ*</label>
                                <input type="text" class="form-control" name="cpfcnpj" require>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Senha*</label>
                                <input type="password" class="form-control" name="senha" require>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Link*</label>
                                <input type="text" class="form-control" name="link" require>
                            </div>
                        </div>
                    </div>
                    <div class="mrg-right">
                        <button type="submit" class="btn btn-success"> Salvar</button>
                    </div>
                </form>
                
                <!-- End SmartWizard Content -->
            </div>
        </div>
<!-- Custom Theme Scripts -->
<!-- /page content -->
@endsection