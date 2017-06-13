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
            <small>Você está participando</small>
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
                        <h3 class="box-title">Reuniões que participa</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Editar</th>
                            <th>Tema</th>
                            <th>Data</th> 
                          </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($itensparticipa as $itens)
                        <tr>
                            <td><a href="{{ url('/edit-reuniao') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td>{{ $itens->Tema }}</td>
                            <td>{{ $itens->Data_Hora }}</td>

                        </tr>
                        @endforeach
                        
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