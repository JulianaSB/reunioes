<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
@extends('base')

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reuniões
            <small>Descrição</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Reuniões</li>
        </ol>
    </section>
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
                    <form id="formReunioes" name="formReunioes">
                    {{ csrf_field() }}
                    @foreach ($itensparticipa as $itens)
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="assunto">Assunto</label>
                                        <input type="text" class="form-control required" id="descricao" name="descricao" placeholder="Descrição" value="{{ $itens->Assunto }}">

                                        <input type="checkbox" id="checkBox" /><label>Adicionar novo assunto: </label>
                                        
                                        <div id="addAssunto"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tema">Tema</label>
                                        <input type="tema" class="form-control required" id="tema" name="tema" placeholder="Tema" value="{{ $itens->Tema }}">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pautas">Pautas</label>
                                        <input type="text" class="form-control required" id="pautas" name="pautas" placeholder="Pautas" value="{{ $itens->Pautas }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control required" id="descricao" name="descricao" placeholder="Descrição" value="{{ $itens->Descricao }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                            <label for="data_hora">Data e Hora</label>
                                            <input type="text" id="datepicker" name="datepicker" class="datepicker required" placeholder="Data e Hora" value="{{ $itens->Data_Hora }}">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                            <label for="tipo_reuniao">Tipo de Reunião</label>
                                            <select class="form-control" id="tipo_reuniao" name="tipo_reuniao">
                                                    <option value="reuniao_de_area">Reunião de Área</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quorum">Quorum?</label>
                                        <br>
                                        <input type="radio" id="quorum" name="quorum" value="1">Sim
                                        <input type="radio" id="quorum" name="quorum" value="0"> Não
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="segunda_chamada">Segunda Chamada?</label>
                                        <br>
                                        <input type="radio" id="segunda_chamada" name="segunda_chamada" value="1">Sim
                                        <input type="radio" id="segunda_chamada" name="segunda_chamada" value="0"> Não
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="participantes">Participantes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button class="btn btn-default back" href="{{ url('/manageMeeting') }}">Cancelar</button>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </section>
    @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Registrar</a>
    @endif
</div>
@endif     
@endsection

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.js"></script>
    
<script>
    jQuery(document).ready(function () {
       $("#checkBox").click(function () {
            $('#textBox').attr("disabled", $(this).is(":checked"));
            var $this = $(this);
            if ($this.is(':checked')) {
                $('#addAssunto').append('<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto Novo">');
            }else{
                $('#addAssunto').find('#assunto').remove();
            }
       });
    });
    $(function () {
        $('#icheck').iCheck();
        $('#datepicker').datepicker();
        $('#formReunioes').on('submit', function(e){
            e.preventDefault();
            $(".required").parent('.form-group').removeClass('has-error');
            $(".required").each(function(){
                if ($(this).val() == '')
                    $(this).parent('.form-group').addClass('has-error');
            });
            
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var reunioes = {
                assunto: $("#assunto").val(),
                pautas: $("#pautas").val(),
            }

            $.ajax({
                type: "POST",
                url: "/update",
                data:  JSON.stringify(reunioes), 
                contentType: "application/json; charset=utf-8",
                success: function(response) {
                    alert("Reunião Alterada!");
                    window.location.href = '/';
                },
                error: function(response){
                    
                }
            });
        });
    });

    $(function () {
            $('#icheck').iCheck();
            $('#datepicker').datepicker();
            
            $('#formReunioes').on('submit', function(e){
                e.preventDefault();
                $(".required").parent('.form-group').removeClass('has-error');
                $(".required").each(function(){
                    if ($(this).val() == '')
                        $(this).parent('.form-group').addClass('has-error');
                });
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var reunioes = {
                    _token: "{{ csrf_token() }}",
                    assunto: $("#assunto").val(),
                    tema: $("#tema").val(),
                    pautas: $("#pautas").val(),
                    descricao: $("#descricao").val(),
                    data_hora: $("#datepicker").val(),
                    tipo_reuniao: $("#tipo_reuniao").val(),
                    quorum: $("#quorum").val(),
                    segunda_chamada: $("#segunda_chamada:checked").val(),
                    participantes: $("#participantes").val(),
                }

                $.ajax({
                    type: "POST",
                    url: "/reunioes",
                    data:  JSON.stringify(reunioes) , 
                    contentType: "application/json; charset=utf-8",
                    success: function(response) {
                        
                    },
                    error: function(response){
                        
                    }
                });
            });
        });
</script>