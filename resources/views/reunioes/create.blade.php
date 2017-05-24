<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
@extends('base')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <h4><i class="fa fa-check"></i> Pronto! </h4>
            <strong>{{ session('success') }}</strong>
        </div>
    @elseif (session('failed'))
        <div class="alert alert-danger">
            <h4><i class="fa fa-warning"></i> ERRO! </h4>
            <strong>{{ session('failed') }}</strong>
        </div>
    @endif
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
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="assunto">Assunto</label>
                                        <!-- <select class="form-control" id="assunto" name="assunto">
                                                <option value="atividades_extra">Atividades Extracurriculares</option>
                                        </select><br> -->
                                        <select id="textBox" name="assunto" class="form-control">
                                          @foreach($itemlist as $items)
                                            <option value="{{ $items->id }}">{{ $items->assunto }}</option>
                                          @endforeach
                                        </select>
                                        
                                        <input type="checkbox" id="checkBox" /><label>Adicionar novo assunto: </label>
                                        
                                        <div id="addAssunto"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tema">Tema</label>
                                        <input type="tema" class="form-control required" id="tema" name="tema" placeholder="Tema">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pautas">Pautas</label>
                                        <input type="text" class="form-control required" id="pautas" name="pautas" placeholder="Pautas">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control required" id="descricao" name="descricao" placeholder="Descrição">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                            <label for="data_hora">Data e Hora</label>
                                            <input type="text" id="datepicker" name="datepicker" class="datepicker required" placeholder="Data e Hora">
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
                                        <!-- <select class="form-control" id="assunto" name="assunto">
                                                <option value="atividades_extra">Atividades Extracurriculares</option>
                                        </select><br> -->
                                        <select multiple id="participantes" name="participantes" class="form-control">
                                         @foreach($participa as $participantes)
                                            <option value="{{ $participantes->id }}">{{ $participantes->name }}</option>
                                          @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button class="btn btn-default back">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
                    _token: "{{ csrf_token() }}",
                    assunto: $("#assunto").val(),
                    tema: $("#tema").val(),
                    pautas: $("#pautas").val(),
                    descricao: $("#descricao").val(),
                    data_hora: $("#datepicker").val(),
                    tipo_reuniao: $("#tipo_reuniao").val(),
                    quorum: $("#quorum").val(),
                    segunda_chamada: $("#segunda_chamada").val(),
                    participantes: 'fulano, beltrano',
                }

                $.ajax({
                    type: "POST",
                    url: "/reunioes",
                    data:  JSON.stringify(reunioes), 
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(data) {
                        console.log("foi");
                    },
                    error: function(data){
                        console.log(reunioes);
                    }
                });
            });
        });
    </script>