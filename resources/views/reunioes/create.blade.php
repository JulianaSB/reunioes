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
                                        <select id="assunto" name="assunto" class="form-control">
                                          @foreach($itemlist as $items)
                                            <option value="{{ $items->id }}">{{ $items->assunto }}</option>
                                          @endforeach
                                        </select>
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
                                            <input type="text" id="daterangepicker" name="data_hora" class="daterangepicker required" placeholder="Data e Hora">
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
                                        <input type="checkbox" class="form-control" id="quorum" name="quorum" maxlength="15" value="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quorum">Segunda chamada</label>
                                        <input type="checkbox" class="form-control" id="segunda_chamada" name="segunda_chamada" maxlength="15" value="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="participantes">Participantes</label>
                                        <select class="form-control" id="participantes" name="participantes">
                                            <option value="rogerio">Rogério</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button class="btn btn-default back">Cancelar</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        $(function () {
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
                    tema: $("#tema").val(),
                    pautas: $("#pautas").val(),
                    descricao: $("#descricao").val(),
                    data_hora: convertData($("#data_hora").val()),
                    tipo_reuniao: $("#tipo_reuniao").val(),
                    segunda_chamada: $("#segunda_chamada").val(),
                    participantes: $("#participantes").val(),
                }

                $.ajax({
                    type: "POST",
                    url: "/reunioes",
                    data: reunioes,
                    dataType: "json",
                    success: function(data) {
                        alert("Reunião agendada com sucesso!");
                    },
                });
            });
            $( ".daterangepicker" ).daterangepicker();
        });
    </script>