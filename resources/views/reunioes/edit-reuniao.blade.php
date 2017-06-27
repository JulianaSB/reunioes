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
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reuniões</li>
        </ol>
    </section>
@if (Route::has('login'))
         @if (Auth::check())
    <!-- Main content -->
    <section class="content">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reuniões</h3>
                    </div>
                    <form id="formReunioesEdit" name="formReunioesEdit">
                    {{ csrf_field() }}
                    @foreach ($itensparticipa as $items)
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="assunto">Assunto</label>
                                        <input disabled type="assunto" class="form-control required" id="assunto" name="assunto" placeholder="Assunto" value="{{ $items->Tema }}">                                   
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tema">Tema</label>
                                        <input disabled type="tema" class="form-control required" id="tema" name="tema" placeholder="Tema" value="{{ $items->Tema }}">
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pautas">Pautas</label>
                                        <input disabled type="text" class="form-control required" id="pautas" name="pautas" placeholder="Pautas" value="{{ $items->Pautas }}">
                                        <input type="checkbox" id="checkBox" /><label>Adicionar nova Pauta: </label>                                       
                                        <div id="addPauta"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input disabled type="text" class="form-control required" id="descricao" name="descricao" placeholder="Descrição" value="{{ $items->Descricao }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                            <label for="data_hora">Data e Hora</label>
                                            <input disabled type="text" id="datepicker" name="datepicker" class="datepicker required" placeholder="Data e Hora" value="{{ $items->Data_Hora }}">
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
                                <div>
                                    <input type="hidden" name="id" value="{{$items->ID_Reuniao}}">
                                </div>
                            </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button class="btn btn-default back" href="{{ url('/reunioes-participa') }}">Cancelar</button>
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
                    $('#addPauta').append('<input type="text" class="form-control" id="pauta" name="pauta" placeholder="Nova Pauta">');
                }else{
                    $('#addPauta').find('#pauta').remove();
                }
           });
        });
        $(function () {
            $('#formReunioesEdit').on('submit', function(e){
                e.preventDefault()                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                    }
                });                
                var reunioesEdit = {
                    pauta: $("#pauta").val(),
                }

                $.ajax({
                    type: "PUT",
                    url: "/reunioesParticipa/{{$items->ID_Reuniao}}",
                    data:  JSON.stringify(reunioesEdit), 
                    contentType: "application/json; charset=utf-8",
                    success: function(response) {
                        alert(response);
                        // window.location.href = '/';
                    },
                    error: function(response){
                        
                    }
                });
            });
        });
    </script>