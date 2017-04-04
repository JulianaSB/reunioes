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
                                        <select class="form-control" id="assunto" name="assunto">
                                                <option value="atividades_extra">Atividades Extracurriculares</option>
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
                                        <label for="senha">Descrição</label>
                                        <input type="password" class="form-control required" id="descricao" name="descricao" placeholder="Descrição">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                            <label for="assunto">Tipo de Reunião</label>
                                            <select class="form-control" id="tipo_reuniao" name="tipo_reuniao">
                                                    <option value="reuniao_de_area">Reunião de Área</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quorum">Quorum?</label>
                                        <input type="checkbox" class="form-control" id="quorum" name="quorum" maxlength="15" value="sim">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quorum">Segunda chamada</label>
                                        <input type="checkbox" class="form-control" id="segunda_chamada" name="segunda_chamada" maxlength="15" value="sim">
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

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button class="btn btn-default back">Cancelar</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                </form>
                </div>
            </div>
            <!-- /.box -->
    </section>

    <script>
        $(function () {
            $('#formReunioes').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: "/reunioes/store",
                    dataType: 'json',
                    success: function(result){
                        if (result.status == 'SUCCESS'){
                           alert('SUCESSO');
                        } else {
                            alert('Não');
                        }
                    }
                });
            })
        });
    </script>