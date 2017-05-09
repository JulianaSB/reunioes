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
            Reuniões Criadas
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reuniões Criadas</li>
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
                        <h3 class="box-title">Reuniões Criadas</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Reunião ID</th>
                            <th>Nome</th>
                            <th>Coodernador</th>
                            <th>Data</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Colocar mais Bebedores</td>
                            <td>Rogério</td>
                            <td>30/05/2017</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Calendário Escolar</td>
                            <td>Rodrigo</td>
                            <td>30/05/2017</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Adimintrar todo o Dinheiro muaHAHA</td>
                            <td>Giovani</td>
                            <td>30/05/2017</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
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