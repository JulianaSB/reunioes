@extends('base')

@section('content')
    <section class="content-header">
        <h1>Reuniões
            <small>Descrição</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reuniões</li>
        </ol>
    </section>
<<<<<<< HEAD
@if (Route::has('login'))
         @if (Auth::check())
    <!-- Main content -->
    <section class="content">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reuniões</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                <form  id="formReunioes" name="formReunioes" role="form" method="POST" action="/users">
                     {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                            
                               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" onkeypress="return txtBoxFormat(event);" minlength="3" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço de E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                      <!--strong>{{ $errors->first('email') }}</strong-->
                                       <strong><?php echo "Este endereço de email não é válido"; ?></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <input id="tipo" type="hidden" class="form-control" name="tipo" value="2">
                        </div>
                        <br><br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" maxlength="10" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                       <!--strong>{{ $errors->first('password') }}</strong-->
                                        <strong><?php echo "A senha deve ter no mínimo 6 dígitos"; ?></strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <br><br>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button class="btn btn-default back">Cancelar</button>

                        </div>
                    </div>
                </div>
            </section>
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Registrar</a>
        @endif
    @endif
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
</script>
 <script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
   
    function txtBoxFormat(evtKeyPress) {
        var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

        if(document.all) { // Internet Explorer
            nTecla = evtKeyPress.keyCode;
        } else if(document.layers) { // Nestcape
            nTecla = evtKeyPress.which;
        } else {
            nTecla = evtKeyPress.which;
            if (nTecla == 8) {
                return true;
            }
        }
        if (nTecla != 8)
          return ((nTecla <= 47) || (nTecla >= 58)); 
        else 
          return true;
    }

    jQuery(document).ready(function () {
        $ ( '#CampoCpf' ) .mask ( '999.999.999-99' , { reverse: true });
        $ ( '#ra' ) .mask ( '999999-9');
});
 </script>
